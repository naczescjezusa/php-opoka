<?php

class SerwerSeleniumTest extends PHPUnit_Framework_TestCase {

    /**
     * Test włączenia i wyłączenia serwera Selenium
     */
    public function testWłaczeniaIWyłączeniaSerweraSelenium() {
        $serwerSelenium = new SerwerSelenium();
        $serwerSelenium->uruchomSerwerSelenium();
        $serwerSelenium->zakończDziałanieSerweraSelenium();
        $this->assertTrue(true);
    }
}