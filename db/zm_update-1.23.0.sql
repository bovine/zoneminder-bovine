--
-- This updates a 1.23.0 database to 1.23.1
--
-- No changes required
--
-- These are optional, but we might as well do it now
--
optimize table Frames;
optimize table Events;
optimize table Filters;
optimize table Zones;
optimize table Monitors;
optimize table Stats;
