<?php

class DateUtilTest extends PHPUnit_Framework_TestCase {
    /**
     * Setup
     */
    public function setUp() {}

    /**
     * Tear Down
     */
    public function tearDown() {}

    /**
     * Test the GMTTime method
     */
    public function test_GMTTime() {
        $this->assertEquals(gmmktime(), DateUtil::GMTTime());
    }
    
    /**
     * Test the formatGMTTime method
     */
    public function test_formatGMTTime() {
        $timestamp = time();
        $timezone = new DateTimeZone('America/Denver');
    	$dateTime = new DateTime();
    	$dateTime->setTimestamp($timestamp);
    	$dateTime->setTimezone($timezone);
    	
        $this->assertEquals($dateTime->format('m/j/Y h:i:s A'), DateUtil::formatGMTTime($timestamp));
        $this->assertEquals($dateTime->format('m/j/Y h:i:s A'), DateUtil::formatGMTTime($timestamp, 'America/Denver'));
    }
    
    /**
     * Test the formatGMTDate method
     */
    public function test_formatGMTDate() {
        $timestamp = time();
        $timezone = new DateTimeZone('America/Denver');
    	$dateTime = new DateTime();
    	$dateTime->setTimestamp($timestamp);
    	$dateTime->setTimezone($timezone);
    	
        $this->assertEquals($dateTime->format('m/j/Y'), DateUtil::formatGMTDate($timestamp));
        $this->assertEquals($dateTime->format('m/j/Y'), DateUtil::formatGMTDate($timestamp, 'America/Denver'));
    }
    
    /**
     * Test the niceTimeFormat method
     */
    public function test_niceTimeFormat() {
        // strings
        $this->assertEquals(date_format(date_create('+1 year'), 'F j, Y \a\t g:ia'), DateUtil::niceTimeFormat('+1 year'));
        $this->assertEquals(date_format(date_create('+1 month'), 'F j, Y \a\t g:ia'), DateUtil::niceTimeFormat('+1 month'));
        $this->assertEquals(date_format(date_create('+1 week'), 'F j, Y \a\t g:ia'), DateUtil::niceTimeFormat('+1 week'));
        $this->assertEquals('Next '. date_format(date_create('+4 day'), 'l \a\t g:ia'), DateUtil::niceTimeFormat('+4 day'));
        $this->assertEquals('3 hours from now', DateUtil::niceTimeFormat('+3 hour'));
        $this->assertEquals('2 minutes from now', DateUtil::niceTimeFormat('+2 minute'));
        $this->assertEquals('20 seconds from now', DateUtil::niceTimeFormat('+20 seconds'));
        $this->assertEquals(date_format(date_create('-1 year'), 'F j, Y \a\t g:ia'), DateUtil::niceTimeFormat('-1 year'));
        $this->assertEquals(date_format(date_create('-1 month'), 'F j \a\t g:ia'), DateUtil::niceTimeFormat('-1 month'));
        $this->assertEquals(date_format(date_create('-1 week'), 'F j \a\t g:ia'), DateUtil::niceTimeFormat('-1 week'));
        $this->assertEquals(date_format(date_create('-4 day'), 'l \a\t g:ia'), DateUtil::niceTimeFormat('-4 day'));
        $this->assertEquals('3 hours ago', DateUtil::niceTimeFormat('-3 hour'));
        $this->assertEquals('2 minutes ago', DateUtil::niceTimeFormat('-2 minute'));
        $this->assertEquals('20 seconds ago', DateUtil::niceTimeFormat('-20 seconds'));
        
    }
}
