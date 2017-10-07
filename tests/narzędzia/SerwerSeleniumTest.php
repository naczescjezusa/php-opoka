<?php

class SerwerSeleniumTest extends PHPUnit_Framework_TestCase {

    /**
     * Test włączenia i wyłączenia serwera Selenium
     */
    public function testWłaczeniaIWyłączeniaSerweraSelenium() {
        if (!function_exists('proc_open')) {
            return;
        }
        $serwerSelenium = new SerwerSelenium();
        $serwerSelenium->uruchomSerwerSelenium();
        $serwerSelenium->zakończDziałanieSerweraSelenium();
        $this->assertTrue(true);
    }
}