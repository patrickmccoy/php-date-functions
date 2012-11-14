php-date-functions
==================

[![Build Status](https://travis-ci.org/patrickmccoy/php-date-functions.png)](https://travis-ci.org/patrickmccoy/php-date-functions)

These are a bunch of functions that deal with printing out dates/times from PHP.

All functions use the PHP DateTime class to print out the date/time in the passed timezone, or in the default timezone set by the user

Example output from the time_ago() function, called from the command line with the following command:

> php -f test.php

+1 year: March 11, 2012 at 1:08pm
+1 month: April 11, 2011 at 1:08pm
+1 week: March 18, 2011 at 1:08pm
+4 days: Next Tuesday at 1:08pm
+3 hours: 3 hours from now
+2 minutes: 2 minutes from now
+20 seconds: 20 seconds from now
-1 year: March 11, 2010 at 1:08pm
-1 month: February 11 at 1:08pm
-1 week: March 4 at 1:08pm
-4 days: Monday at 1:08pm
-3 hours: 3 hours ago
-2 minutes: 2 minutes ago
-20 seconds: 20 seconds ago


> time_ago(string/int $date [, string $timezone]);

$date can either be a string (such as "+1 day") or a unix timestamp.

$timezone must be a string which is a valid timezone from this list: http://www.php.net/manual/en/timezones.php
The default timezone can be set before the function is called using 

> date_default_timezone_set("America/Denver");

The default timezone is set to "America/Denver" in time_functions.php to ensure that PHP doesn't complain.

