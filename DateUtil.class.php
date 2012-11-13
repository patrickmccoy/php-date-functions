<?php

/**
 * set the default timezone for this script
 * see http://www.php.net/manual/en/timezones.php for a list of supported timezones
 * the timezone string in here must be valid for this to work
 */
date_default_timezone_set('America/Denver');

class DateUtil {
    // returns string
    // this function returns the time difference between two times in words, Facebook style
    public static function niceTimeFormat($date, $timezone='') {

    	if (empty($timezone)) {
            $timezone = date_default_timezone_get();
        }
	
    	if (empty($date)) {
            return 'No date provided';
        }
	
    	$periods         = array('second', 'minute', 'hour', 'day');
    	$lengths         = array('60','60','24','7');
	
    	$now             = time();
    	$unix_date       = is_int($date) ? $date : strtotime($date);
	
    	// check validity of date
    	if (empty($unix_date)) {
            return 'Bad date';
        }
	
    	// state the tense
    	// is it future date or past date
    	if ($now > $unix_date) {    
    		$difference     = $now - $unix_date;
    		$tense         = 'ago';
    	} else {
    		$difference     = $unix_date - $now;
    		$tense         = 'from now';
    	}
	
    	for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
    		$difference /= $lengths[$j];
    	}
	
    	$difference = round($difference);
	
    	// we never want to return 0 seconds, it looks funny
    	if (($j == 0) && ($difference == 0)) {
    		$difference++;
    	}
	
    	if ($difference != 1) {
    		$periods[$j].= 's';
    	}
	
	
	
    	$return = $difference .' '. $periods[$j] .' '. $tense;
	
    	// If the return is days, we do some special processing
    	if ($j == 3) {
    		// set the timezone using DateTime
    		$timezone = new DateTimeZone($timezone);
    		$dateTime = new DateTime();
    		$dateTime->setTimestamp($unix_date);
    		$dateTime->setTimezone($timezone);
		
    		$nowDateTime = new DateTime();
    		$nowDateTime->setTimestamp($now);
    		$nowDateTime->setTimezone($timezone);
		
		
    		if ($difference == 1) {
    			if ($tense == 'ago') {
                    $return = 'Yesterday';
    			} else {
                    $return = 'Tomorrow';
                }
    		} else if ($difference < 7) {
    			if ($tense != 'ago') {
                    $return = 'Next '.$dateTime->format('l');
                } else { 
                    $return = $dateTime->format('l');
                }
    		} else {
    			if (($dateTime->format('Y') === $nowDateTime->format('Y')) && ($tense == 'ago')) {
    				$return = $dateTime->format('F j');
    			} else {
    				$return = $dateTime->format('F j, Y');
    			}
		
    		}
    		$return .= ' at '.$dateTime->format('g:ia');
    	}
	
    	return $return;
    }

    // alias for nice_time_format()
    public static function timeAgo($date, $timezone='') {
        return self::niceTimeFormat($date,$timezone);
    }


    // return current unix timestamp in GMT
    public static function GMTTime() {
    	return gmmktime();
    }

    // return a formatted time string from GMT time, in the specified timezone
    public static function formatGMTTime($timestamp, $timezone='') {
	
    	if (empty($timezone)) {
            $timezone = date_default_timezone_get();
        }

    	$timezone = new DateTimeZone($timezone);
    	$dateTime = new DateTime();
    	$dateTime->setTimestamp($timestamp);
    	$dateTime->setTimezone($timezone);
	
    	return $dateTime->format('m/j/Y h:i:s A');
    }

    // return a mm/dd/yyyy formatted GMT timestamp, in the specified timezone
    public static function formatGMTDate($timestamp, $timezone='') {

    	if (empty($timezone)) {
            $timezone = date_default_timezone_get();
        }

    	$timezone = new DateTimeZone($timezone);
    	$dateTime = new DateTime();
    	$dateTime->setTimestamp($timestamp);
    	$dateTime->setTimezone($timezone);
	
    	return $dateTime->format('m/j/Y');
    }

}
