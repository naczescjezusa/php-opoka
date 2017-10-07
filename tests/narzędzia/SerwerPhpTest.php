<?php

class SerwerPhpTest extends PHPUnit_Framework_TestCase {

    /**
     * Test włączenia i wyłączenia serwera PHP
     */
    public function testWłaczeniaIWyłączeniaSerweraPhp() {
        $serwerPhp = new SerwerPhp();
        $serwerPhp->uruchomPhpSerwer();
        $serwerPhp->zakończDziałanieSerweraPhp();
        $this->assertTrue(true);
    }
}