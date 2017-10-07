<?php

class SerwerSelenium {

    /**
     * Selenium serwer proces
     * @var proccess
     */
    private $seleniumSerwerProces;

    /**
     * Uruchom serwer Selenium
     * @throws Exception
     */
    public function uruchomSerwerSelenium() {
        $ścieżkaSeleniumJar = dirname(__FILE__) . '/../../vendor/bin/selenium-server-standalone';
        $ścieżkaSeleniumJar = realpath($ścieżkaSeleniumJar);
        $komenda = sprintf('%s -port %d', $ścieżkaSeleniumJar, SELENIUM_SERWER_PORT);
        $specyfikacjaProcesu = array(
            0 => array('pipe', 'r'),
            1 => array('pipe', 'w'),
            2 => array('pipe', 'w')
        );
        $proces = proc_open($komenda, $specyfikacjaProcesu, $pipes);
        if (!is_resource($proces)) {
            throw new Exception('Nie można uruchomić procesu: ' . $komenda);
        }
        $this->seleniumSerwerProces = $proces;
        $this->czekajNaUruchomienieSerweraSelenium();
    }

    /**
     * Zakończ działanie serwera Selenium
     */
    public function zakończDziałanieSerweraSelenium() {
        proc_terminate($this->seleniumSerwerProces, -9);
        print_r(PHP_EOL . 'Zakończono działanie serwera Selenium pod adresem: ' . SELENIUM_SERWER_HOST . ':' . SELENIUM_SERWER_PORT);
    }

    /**
     * Czekaj na uruchomienie serwera Selenium
     * @return null
     * @throws Exception
     */
    private function czekajNaUruchomienieSerweraSelenium() {
        for ($i = 0; $i < 30; $i++) {
            $kod_odpowiedzi = @get_headers(SELENIUM_SERWER_HOST . ':' . SELENIUM_SERWER_PORT)[0];
            if (strpos($kod_odpowiedzi, '200') !== false) {
                print_r(PHP_EOL . 'Uruchomiono serwer Selenium pod adresem: ' . SELENIUM_SERWER_HOST . ':' . SELENIUM_SERWER_PORT);
                return;
            }
            sleep(1);
        }
        throw new Exception('Nie można zweryfikować uruchomienia serwera Selenium. Kod odpowiedzi: ' . $kod_odpowiedzi);
    }

}
