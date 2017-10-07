<?php

/**
 * Serwer PHP
 * 
 * @author     Karol Golec <naczescjezusa@gmail.com>
 */
class SerwerPhp {

    /**
     * PHP serwer proces
     * @var proccess
     */
    private $phpSerwerProces;

    /**
     * Uruchom PHP serwer
     * @throws Exception
     */
    public function uruchomPhpSerwer() {
        $katalogRoot = dirname(__FILE__) . '/' . PHP_SERWER_KATALOG_ROOT;
        $komenda = sprintf('php -S %s:%d -t "%s"', PHP_SERWER_HOST, PHP_SERWER_PORT, $katalogRoot);
        $specyfikacjaProcesu = array(
            0 => array('pipe', 'r'),
            1 => array('pipe', 'w'),
            2 => array('pipe', 'w')
        );
        $proces = proc_open($komenda, $specyfikacjaProcesu, $pipes);
        if (!is_resource($proces)) {
            throw new Exception('Nie można uruchomić procesu: ' . $komenda);
        }
        $this->phpSerwerProces = $proces;
        $this->czekajNaUruchomieniePhpSerwera();
    }

    /**
     * Czekaj na uruchomienie PHP serwera
     * @return null
     * @throws Exception
     */
    private function czekajNaUruchomieniePhpSerwera() {
        for ($i = 0; $i < 30; $i++) {
            $kod_odpowiedzi = @get_headers('http://' . PHP_SERWER_HOST . ':' . PHP_SERWER_PORT)[0];
            if (strpos($kod_odpowiedzi, '200') !== false) {
                print_r(PHP_EOL . 'Uruchomiono serwer PHP pod adresem: ' . 'http://' . PHP_SERWER_HOST . ':' . PHP_SERWER_PORT);
                return;
            }
            sleep(1);
        }
        throw new Exception('Nie można zweryfikować uruchomienia serwera PHP.');
    }

    /**
     * Zakończ działanie serwera PHP
     */
    public function zakończDziałanieSerweraPhp() {
        proc_terminate($this->phpSerwerProces, -9);
        print_r(PHP_EOL . 'Zakończono działanie serwera PHP pod adresem: ' . 'http://' . PHP_SERWER_HOST . ':' . PHP_SERWER_PORT);
    }

}
