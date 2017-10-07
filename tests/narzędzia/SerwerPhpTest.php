<?php

class SerwerPhpTest extends PHPUnit_Framework_TestCase {

    /**
     * Test włączenia i wyłączenia serwera PHP
     */
    public function testWłaczeniaIWyłączeniaSerweraPhp() {
        if (!function_exists('proc_open')) {
            return;
        }
        $serwerPhp = new SerwerPhp();
        $serwerPhp->uruchomPhpSerwer();
        $serwerPhp->zakończDziałanieSerweraPhp();
        $this->assertTrue(true);
    }

}
