<?php

use NaCzescJezusa\Opoka\Opoka;

class OpokaTest extends PHPUnit_Framework_TestCase {

    /**
     * Serwer PHP
     * @var SerwerPhp
     */
    private $serwerPhp;

    /**
     * Serwer Selenium
     * @var SerwerSelenium
     */
    private $serwerSelenium;

    /**
     * Przed wszystkimi testami
     */
    protected function setUp() {
        if (function_exists('proc_open')) {
            $this->serwerPhp = new SerwerPhp();
            $this->serwerPhp->uruchomPhpSerwer();
            $this->serwerSelenium = new SerwerSelenium();
            $this->serwerSelenium->uruchomSerwerSelenium();
        }
    }

    public function testStrukturyModułówIFunkcji() {
        $opoka = new Opoka();
        $opoka->uruchomBibliotekę();
        $this->assertTrue(true);
    }

    /**
     * Funkcja na zakończenie wszystkich testów
     */
    public function tearDown() {
        if (function_exists('proc_open')) {
            $this->serwerPhp->zakończDziałanieSerweraPhp();
            $this->serwerSelenium->zakończDziałanieSerweraSelenium();
        }
    }

}
