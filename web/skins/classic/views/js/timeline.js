var events = new Object();

function showEvent( eid, fid, width, height )
{
    var url = '?view=event&eid='+eid+'&fid='+fid;
    url += filterQuery;
    createPopup( url, 'zmEvent', 'event', width, height );
}

function createEventHtml( event, frame )
{
    var eventHtml = new Element( 'div' );

    if ( event.Archived > 0 )
        eventHtml.addClass( 'archived' );

    new Element( 'p' ).injectInside( eventHtml ).setText( monitorNames[event.MonitorId] );
    new Element( 'p' ).injectInside( eventHtml ).setText( event.Name+(frame?("("+frame.FrameId+")"):"") );
    new Element( 'p' ).injectInside( eventHtml ).setText( event.StartTime+" - "+event.Length+"s" );
    new Element( 'p' ).injectInside( eventHtml ).setText( event.Cause );
    if ( event.Notes )
        new Element( 'p' ).injectInside( eventHtml ).setText( event.Notes );
    if ( event.Archived > 0 )
        new Element( 'p' ).injectInside( eventHtml ).setText( archivedString );

    return( eventHtml );
}

function showEventDetail( eventHtml )
{
    $('instruction').addClass( 'hidden' );
    $('eventData').empty();
    $('eventData').adopt( eventHtml );
    $('eventData').removeClass( 'hidden' );
}

function eventDataResponse( respText )
{
    if ( respText == 'Ok' )
        return;
    var response = Json.evaluate( respText );

    var event = response.event;
    if ( !event )
    {
        console.log( "Null event" );
        return;
    }
    events[event.Id] = event;

    if ( response.loopback )
    {
        requestFrameData( event.Id, response.loopback );
    }
}

function frameDataResponse( respText )
{
    if ( respText == 'Ok' )
        return;
    var response = Json.evaluate( respText );

    var frame = response.frameimage;
    if ( !frame.FrameId )
    {
        console.log( "Null frame" );
        return;
    }

    var event = events[frame.EventId];
    if ( !event )
    {
        console.error( "No event "+frame.eventId+" found" );
        return;
    }

    if ( !event['frames'] )
        event['frames'] = new Object();

    event['frames'][frame.FrameId] = frame;
    event['frames'][frame.FrameId]['html'] = createEventHtml( event, frame );
    showEventDetail( event['frames'][frame.FrameId]['html'] );
    loadEventImage( frame.Image.imagePath, event.Id, frame.FrameId, event.Width, event.Height );
}

var eventQuery = new Ajax( thisUrl, { method: 'post', timeout: AJAX_TIMEOUT, autoCancel: true, onComplete: eventDataResponse } );
var frameQuery = new Ajax( thisUrl, { method: 'post', timeout: AJAX_TIMEOUT, autoCancel: true, onComplete: frameDataResponse } );

function requestFrameData( eventId, frameId )
{
    if ( !events[eventId] )
    {
        eventQuery.options.data = "view=request&request=status&entity=event&id="+eventId+"&loopback="+frameId;
        eventQuery.request();
    }
    else
    {
        frameQuery.options.data = "view=request&request=status&entity=frameimage&id[0]="+eventId+"&id[1]="+frameId;
        frameQuery.request();
    }
}

function previewEvent( eventId, frameId )
{
    if ( events[eventId] )
    {
        if ( events[eventId]['frames'] )
        {
            if ( events[eventId]['frames'][frameId] )
            {
                showEventDetail( events[eventId]['frames'][frameId]['html'] );
                loadEventImage( events[eventId].frames[frameId].Image.imagePath, eventId, frameId, events[eventId].Width, events[eventId].Height );
                return;
            }
        }
    }
    requestFrameData( eventId, frameId );
}

function loadEventImage( imagePath, eid, fid, width, height )
{
    var imageSrc = $('imageSrc');
    imageSrc.setProperty( 'src', imagePath );
    imageSrc.removeEvent( 'click' );
    imageSrc.addEvent( 'click', showEvent.pass( [ eid, fid, width, height ] ) );
    var eventData = $('eventData');
    eventData.removeEvent( 'click' );
    eventData.addEvent( 'click', showEvent.pass( [ eid, fid, width, height ] ) );
}

function tlZoomBounds( minTime, maxTime )
{
    console.log( "Zooming" );
    window.location = '?view='+currentView+filterQuery+'&minTime='+minTime+'&maxTime='+maxTime;
}

function tlZoomRange( midTime, range )
{
    window.location = '?view='+currentView+filterQuery+'&midTime='+midTime+'&range='+range;
}

function tlPan( midTime, range )
{
    window.location = '?view='+currentView+filterQuery+'&midTime='+midTime+'&range='+range;
}
