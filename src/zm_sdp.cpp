#include "zm_ffmpeg.h"
#include "zm_sdp.h"

#include <ctype.h>

static int inet_aton (const char * str, struct in_addr * add)
{
    unsigned int add1 = 0, add2 = 0, add3 = 0, add4 = 0;

    if (sscanf(str, "%d.%d.%d.%d", &add1, &add2, &add3, &add4) != 4)
        return 0;

    if (!add1 || (add1|add2|add3|add4) > 255) return 0;

    add->s_addr=(add4<<24)+(add3<<16)+(add2<<8)+add1;

    return 1;
}

static void __dynarray_add(unsigned long **tab_ptr, int *nb_ptr, unsigned long elem)
{
    int nb, nb_alloc;
    unsigned long *tab;

    nb = *nb_ptr;
    tab = *tab_ptr;
    if ((nb & (nb - 1)) == 0) {
        if (nb == 0)
            nb_alloc = 1;
        else
            nb_alloc = nb * 2;
        tab = (long unsigned int *)av_realloc(tab, nb_alloc * sizeof(unsigned long));
        *tab_ptr = tab;
    }
    tab[nb++] = elem;
    *nb_ptr = nb;
}

#ifdef __GNUC__
#define dynarray_add(tab, nb_ptr, elem)\
do {\
    typeof(tab) _tab = (tab);\
    typeof(elem) _elem = (elem);\
    (void)sizeof(**_tab == _elem); /* check that types are compatible */\
    __dynarray_add((unsigned long **)_tab, nb_ptr, (unsigned long)_elem);\
} while(0)
#else
#define dynarray_add(tab, nb_ptr, elem)\
do {\
    __dynarray_add((unsigned long **)(tab), nb_ptr, (unsigned long)(elem));\
} while(0)
#endif

static void url_split(char *proto, int proto_size,
               char *authorization, int authorization_size,
               char *hostname, int hostname_size,
               int *port_ptr,
               char *path, int path_size,
               const char *url)
{
    const char *p, *ls, *at, *col, *brk;

    if (port_ptr)               *port_ptr = -1;
    if (proto_size > 0)         proto[0] = 0;
    if (authorization_size > 0) authorization[0] = 0;
    if (hostname_size > 0)      hostname[0] = 0;
    if (path_size > 0)          path[0] = 0;

    /* parse protocol */
    if ((p = strchr(url, ':'))) {
        av_strlcpy(proto, url, FFMIN(proto_size, p + 1 - url));
        p++; /* skip ':' */
        if (*p == '/') p++;
        if (*p == '/') p++;
    } else {
        /* no protocol means plain filename */
        av_strlcpy(path, url, path_size);
        return;
    }

    /* separate path from hostname */
    ls = strchr(p, '/');
    if(!ls)
        ls = strchr(p, '?');
    if(ls)
        av_strlcpy(path, ls, path_size);
    else
        ls = &p[strlen(p)]; // XXX

    /* the rest is hostname, use that to parse auth/port */
    if (ls != p) {
        /* authorization (user[:pass]@hostname) */
        if ((at = strchr(p, '@')) && at < ls) {
            av_strlcpy(authorization, p,
                       FFMIN(authorization_size, at + 1 - p));
            p = at + 1; /* skip '@' */
        }

        if (*p == '[' && (brk = strchr(p, ']')) && brk < ls) {
            /* [host]:port */
            av_strlcpy(hostname, p + 1,
                       FFMIN(hostname_size, brk - p));
            if (brk[1] == ':' && port_ptr)
                *port_ptr = atoi(brk + 2);
        } else if ((col = strchr(p, ':')) && col < ls) {
            av_strlcpy(hostname, p,
                       FFMIN(col + 1 - p, hostname_size));
            if (port_ptr) *port_ptr = atoi(col + 1);
        } else
            av_strlcpy(hostname, p,
                       FFMIN(ls + 1 - p, hostname_size));
    }
}

static int redir_isspace(int c)
{
    return (c == ' ' || c == '\t' || c == '\n' || c == '\r');
}

static void skip_spaces(const char **pp)
{
    const char *p;
    p = *pp;
    while (redir_isspace(*p))
        p++;
    *pp = p;
}

static void get_word_sep(char *buf, int buf_size, const char *sep,
                         const char **pp)
{
    const char *p;
    char *q;

    p = *pp;
    if (*p == '/')
        p++;
    skip_spaces(&p);
    q = buf;
    while (!strchr(sep, *p) && *p != '\0') {
        if ((q - buf) < buf_size - 1)
            *q++ = *p;
        p++;
    }
    if (buf_size > 0)
        *q = '\0';
    *pp = p;
}

static void get_word(char *buf, int buf_size, const char **pp)
{
    const char *p;
    char *q;

    p = *pp;
    skip_spaces(&p);
    q = buf;
    while (!redir_isspace(*p) && *p != '\0') {
        if ((q - buf) < buf_size - 1)
            *q++ = *p;
        p++;
    }
    if (buf_size > 0)
        *q = '\0';
    *pp = p;
}

/* parse the rtpmap description: <codec_name>/<clock_rate>[/<other
   params>] */
static int sdp_parse_rtpmap(AVCodecContext *codec, RTSPStream *rtsp_st, int payload_type, const char *p)
{
    char buf[256];
    int i;
    AVCodec *c;
    const char *c_name;

    /* Loop into AVRtpDynamicPayloadTypes[] and AVRtpPayloadTypes[] and
       see if we can handle this kind of payload */
    get_word_sep(buf, sizeof(buf), "/", &p);
    if (payload_type >= RTP_PT_PRIVATE) {
        RTPDynamicProtocolHandler *handler= RTPFirstDynamicPayloadHandler;
        while(handler) {
            if (!strcmp(buf, handler->enc_name) && (codec->codec_type == handler->codec_type)) {
                codec->codec_id = handler->codec_id;
                rtsp_st->dynamic_handler= handler;
                if(handler->open) {
                    rtsp_st->dynamic_protocol_context= handler->open();
                }
                break;
            }
            handler= handler->next;
        }
    } else {
        /* We are in a standard case ( from http://www.iana.org/assignments/rtp-parameters) */
        /* search into AVRtpPayloadTypes[] */
        codec->codec_id = ff_rtp_codec_id(buf, codec->codec_type);
    }

    c = avcodec_find_decoder(codec->codec_id);
    if (c && c->name)
        c_name = c->name;
    else
        c_name = (char *)NULL;

    if (c_name) {
        get_word_sep(buf, sizeof(buf), "/", &p);
        i = atoi(buf);
        switch (codec->codec_type) {
            case CODEC_TYPE_AUDIO:
                av_log(codec, AV_LOG_DEBUG, " audio codec set to : %s\n", c_name);
                codec->sample_rate = RTSP_DEFAULT_AUDIO_SAMPLERATE;
                codec->channels = RTSP_DEFAULT_NB_AUDIO_CHANNELS;
                if (i > 0) {
                    codec->sample_rate = i;
                    get_word_sep(buf, sizeof(buf), "/", &p);
                    i = atoi(buf);
                    if (i > 0)
                        codec->channels = i;
                    // TODO: there is a bug here; if it is a mono stream, and less than 22000Hz, faad upconverts to stereo and twice the
                    //  frequency.  No problem, but the sample rate is being set here by the sdp line.  Upcoming patch forthcoming. (rdm)
                }
                av_log(codec, AV_LOG_DEBUG, " audio samplerate set to : %i\n", codec->sample_rate);
                av_log(codec, AV_LOG_DEBUG, " audio channels set to : %i\n", codec->channels);
                break;
            case CODEC_TYPE_VIDEO:
                av_log(codec, AV_LOG_DEBUG, " video codec set to : %s\n", c_name);
                // Total hack here I suspect
                codec->sample_rate = i;
                break;
            default:
                break;
        }
        return 0;
    }

    return -1;
}

/* return the length and optionnaly the data */
static int hex_to_data(uint8_t *data, const char *p)
{
    int c, len, v;

    len = 0;
    v = 1;
    for(;;) {
        skip_spaces(&p);
        if (p == '\0')
            break;
        c = toupper((unsigned char)*p++);
        if (c >= '0' && c <= '9')
            c = c - '0';
        else if (c >= 'A' && c <= 'F')
            c = c - 'A' + 10;
        else
            break;
        v = (v << 4) | c;
        if (v & 0x100) {
            if (data)
                data[len] = v;
            len++;
            v = 1;
        }
    }
    return len;
}

static void sdp_parse_fmtp_config(AVCodecContext *codec, char *attr, char *value)
{
    switch (codec->codec_id) {
        case CODEC_ID_MPEG4:
        case CODEC_ID_AAC:
            if (!strcmp(attr, "config")) {
                /* decode the hexa encoded parameter */
                int len = hex_to_data(NULL, value);
                codec->extradata = (uint8_t *)av_mallocz(len + FF_INPUT_BUFFER_PADDING_SIZE);
                if (!codec->extradata)
                    return;
                codec->extradata_size = len;
                hex_to_data(codec->extradata, value);
            }
            break;
        default:
            break;
    }
    return;
}

typedef struct attrname_map
{
    const char *str;
    uint16_t type;
    uint32_t offset;
} attrname_map_t;

/* All known fmtp parmeters and the corresping RTPAttrTypeEnum */
#define ATTR_NAME_TYPE_INT 0
#define ATTR_NAME_TYPE_STR 1
static attrname_map_t attr_names[]=
{
    {"SizeLength",       ATTR_NAME_TYPE_INT, offsetof(rtp_payload_data_t, sizelength)},
    {"IndexLength",      ATTR_NAME_TYPE_INT, offsetof(rtp_payload_data_t, indexlength)},
    {"IndexDeltaLength", ATTR_NAME_TYPE_INT, offsetof(rtp_payload_data_t, indexdeltalength)},
    {"profile-level-id", ATTR_NAME_TYPE_INT, offsetof(rtp_payload_data_t, profile_level_id)},
    {"StreamType",       ATTR_NAME_TYPE_INT, offsetof(rtp_payload_data_t, streamtype)},
    {"mode",             ATTR_NAME_TYPE_STR, offsetof(rtp_payload_data_t, mode)},
    {NULL, -1, -1},
};

/* parse a SDP line and save stream attributes */
static void sdp_parse_fmtp(AVStream *st, const char *p)
{
    char attr[256];
    char value[4096];
    int i;

    RTSPStream *rtsp_st = (RTSPStream *)st->priv_data;
    AVCodecContext *codec = st->codec;
    rtp_payload_data_t *rtp_payload_data = &rtsp_st->rtp_payload_data;

    /* loop on each attribute */
    while(rtsp_next_attr_and_value(&p, attr, sizeof(attr), value, sizeof(value)))
    {
        /* grab the codec extra_data from the config parameter of the fmtp line */
        sdp_parse_fmtp_config(codec, attr, value);
        /* Looking for a known attribute */
        for (i = 0; attr_names[i].str; ++i) {
            if (!strcasecmp(attr, attr_names[i].str)) {
                if (attr_names[i].type == ATTR_NAME_TYPE_INT)
                    *(int *)((char *)rtp_payload_data + attr_names[i].offset) = atoi(value);
                else if (attr_names[i].type == ATTR_NAME_TYPE_STR)
                    *(char **)((char *)rtp_payload_data + attr_names[i].offset) = av_strdup(value);
            }
        }
    }
}

/** Parse a string \p in the form of Range:npt=xx-xx, and determine the start
 *  and end time.
 *  Used for seeking in the rtp stream.
 */
static void rtsp_parse_range_npt(const char *p, int64_t *start, int64_t *end)
{
    char buf[256];

    skip_spaces(&p);
    if (!av_stristart(p, "npt=", &p))
        return;

    *start = AV_NOPTS_VALUE;
    *end = AV_NOPTS_VALUE;

    get_word_sep(buf, sizeof(buf), "-", &p);
    *start = parse_date(buf, 1);
    if (*p == '-') {
        p++;
        get_word_sep(buf, sizeof(buf), "-", &p);
        *end = parse_date(buf, 1);
    }
//    av_log(NULL, AV_LOG_DEBUG, "Range Start: %lld\n", *start);
//    av_log(NULL, AV_LOG_DEBUG, "Range End: %lld\n", *end);
}

typedef struct SDPParseState {
    /* SDP only */
    struct in_addr default_ip;
    int default_ttl;
} SDPParseState;

static void sdp_parse_line(AVFormatContext *s, SDPParseState *s1,
                           int letter, const char *buf)
{
    RTSPState *rt = (RTSPState *)s->priv_data;
    char buf1[64], st_type[64];
    const char *p;
    int codec_type, payload_type, i;
    AVStream *st;
    RTSPStream *rtsp_st;
    struct in_addr sdp_ip;
    int ttl;

#ifdef DEBUG
    printf("sdp: %c='%s'\n", letter, buf);
#endif

    p = buf;
    switch(letter) {
    case 'c':
        get_word(buf1, sizeof(buf1), &p);
        if (strcmp(buf1, "IN") != 0)
            return;
        get_word(buf1, sizeof(buf1), &p);
        if (strcmp(buf1, "IP4") != 0)
            return;
        get_word_sep(buf1, sizeof(buf1), "/", &p);
        if (inet_aton(buf1, &sdp_ip) == 0)
            return;
        ttl = 16;
        if (*p == '/') {
            p++;
            get_word_sep(buf1, sizeof(buf1), "/", &p);
            ttl = atoi(buf1);
        }
        if (s->nb_streams == 0) {
            s1->default_ip = sdp_ip;
            s1->default_ttl = ttl;
        } else {
            st = s->streams[s->nb_streams - 1];
            rtsp_st = (RTSPStream *)st->priv_data;
            rtsp_st->sdp_ip = sdp_ip;
            rtsp_st->sdp_ttl = ttl;
        }
        break;
    case 's':
        av_strlcpy(s->title, p, sizeof(s->title));
        break;
    case 'i':
        if (s->nb_streams == 0) {
            av_strlcpy(s->comment, p, sizeof(s->comment));
            break;
        }
        break;
    case 'm':
        /* new stream */
        get_word(st_type, sizeof(st_type), &p);
        if (!strcmp(st_type, "audio")) {
            codec_type = CODEC_TYPE_AUDIO;
        } else if (!strcmp(st_type, "video")) {
            codec_type = CODEC_TYPE_VIDEO;
        } else {
            return;
        }
        rtsp_st = (RTSPStream *)av_mallocz(sizeof(RTSPStream));
        if (!rtsp_st)
            return;
        rtsp_st->stream_index = -1;
        dynarray_add(&rt->rtsp_streams, &rt->nb_rtsp_streams, rtsp_st);

        rtsp_st->sdp_ip = s1->default_ip;
        rtsp_st->sdp_ttl = s1->default_ttl;

        get_word(buf1, sizeof(buf1), &p); /* port */
        rtsp_st->sdp_port = atoi(buf1);

        get_word(buf1, sizeof(buf1), &p); /* protocol (ignored) */

        /* XXX: handle list of formats */
        get_word(buf1, sizeof(buf1), &p); /* format list */
        rtsp_st->sdp_payload_type = atoi(buf1);

        if (!strcmp(ff_rtp_enc_name(rtsp_st->sdp_payload_type), "MP2T")) {
            /* no corresponding stream */
        } else {
            st = av_new_stream(s, 0);
            if (!st)
                return;
            st->priv_data = rtsp_st;
            rtsp_st->stream_index = st->index;
            st->codec->codec_type = (CodecType)codec_type;
            if (rtsp_st->sdp_payload_type < RTP_PT_PRIVATE) {
                /* if standard payload type, we can find the codec right now */
                rtp_get_codec_info(st->codec, rtsp_st->sdp_payload_type);
            }
        }
        /* put a default control url */
        av_strlcpy(rtsp_st->control_url, s->filename, sizeof(rtsp_st->control_url));
        break;
    case 'a':
        if (av_strstart(p, "control:", &p) && s->nb_streams > 0) {
            char proto[32];
            /* get the control url */
            st = s->streams[s->nb_streams - 1];
            rtsp_st = (RTSPStream *)st->priv_data;

            /* XXX: may need to add full url resolution */
            url_split(proto, sizeof(proto), NULL, 0, NULL, 0, NULL, NULL, 0, p);
            if (proto[0] == '\0') {
                /* relative control URL */
                av_strlcat(rtsp_st->control_url, "/", sizeof(rtsp_st->control_url));
                av_strlcat(rtsp_st->control_url, p,   sizeof(rtsp_st->control_url));
            } else {
                av_strlcpy(rtsp_st->control_url, p,   sizeof(rtsp_st->control_url));
            }
        } else if (av_strstart(p, "rtpmap:", &p)) {
            /* NOTE: rtpmap is only supported AFTER the 'm=' tag */
            get_word(buf1, sizeof(buf1), &p);
            payload_type = atoi(buf1);
            for(i = 0; i < s->nb_streams;i++) {
                st = s->streams[i];
                rtsp_st = (RTSPStream *)st->priv_data;
                if (rtsp_st->sdp_payload_type == payload_type) {
                    sdp_parse_rtpmap(st->codec, rtsp_st, payload_type, p);
                }
            }
        } else if (av_strstart(p, "fmtp:", &p)) {
            /* NOTE: fmtp is only supported AFTER the 'a=rtpmap:xxx' tag */
            get_word(buf1, sizeof(buf1), &p);
            payload_type = atoi(buf1);
            for(i = 0; i < s->nb_streams;i++) {
                st = s->streams[i];
                rtsp_st = (RTSPStream *)st->priv_data;
                if (rtsp_st->sdp_payload_type == payload_type) {
                    if(rtsp_st->dynamic_handler && rtsp_st->dynamic_handler->parse_sdp_a_line) {
                        if(!rtsp_st->dynamic_handler->parse_sdp_a_line(st, rtsp_st->dynamic_protocol_context, buf)) {
                            sdp_parse_fmtp(st, p);
                        }
                    } else {
                        sdp_parse_fmtp(st, p);
                    }
                }
            }
        } else if(av_strstart(p, "framesize:", &p)) {
            // let dynamic protocol handlers have a stab at the line.
            get_word(buf1, sizeof(buf1), &p);
            payload_type = atoi(buf1);
            for(i = 0; i < s->nb_streams;i++) {
                st = s->streams[i];
                rtsp_st = (RTSPStream *)st->priv_data;
                if (rtsp_st->sdp_payload_type == payload_type) {
                    if(rtsp_st->dynamic_handler && rtsp_st->dynamic_handler->parse_sdp_a_line) {
                        rtsp_st->dynamic_handler->parse_sdp_a_line(st, rtsp_st->dynamic_protocol_context, buf);
                    }
                }
            }
        } else if(av_strstart(p, "range:", &p)) {
            int64_t start, end;

            // this is so that seeking on a streamed file can work.
            rtsp_parse_range_npt(p, &start, &end);
            s->start_time= start;
            s->duration= (end==AV_NOPTS_VALUE)?AV_NOPTS_VALUE:end-start; // AV_NOPTS_VALUE means live broadcast (and can't seek)
        }
        break;
    }
}

int sdp_parse(AVFormatContext *s, const char *content)
{
    const char *p;
    int letter;
    char buf[1024], *q;
    SDPParseState sdp_parse_state, *s1 = &sdp_parse_state;

    memset(s1, 0, sizeof(SDPParseState));
    p = content;
    for(;;) {
        skip_spaces(&p);
        letter = *p;
        if (letter == '\0')
            break;
        p++;
        if (*p != '=')
            goto next_line;
        p++;
        /* get the content */
        q = buf;
        while (*p != '\n' && *p != '\r' && *p != '\0') {
            if ((q - buf) < sizeof(buf) - 1)
                *q++ = *p;
            p++;
        }
        *q = '\0';
        sdp_parse_line(s, s1, letter, buf);
    next_line:
        while (*p != '\n' && *p != '\0')
            p++;
        if (*p == '\n')
            p++;
    }
    return 0;
}

static void rtsp_parse_range(int *min_ptr, int *max_ptr, const char **pp)
{
    const char *p;
    int v;

    p = *pp;
    skip_spaces(&p);
    v = strtol(p, (char **)&p, 10);
    if (*p == '-') {
        p++;
        *min_ptr = v;
        v = strtol(p, (char **)&p, 10);
        *max_ptr = v;
    } else {
        *min_ptr = v;
        *max_ptr = v;
    }
    *pp = p;
}
