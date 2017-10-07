<?php

namespace NaCzescJezusa\Opoka;

use NaCzescJezusa\Opoka\Moduły\AntySelenium\AntySelenium;

/**
 * Opoka
 * 
 * 
 * @package    NaCzescJezusa
 * @subpackage Opoka
 * @author     Karol Golec <naczescjezusa@gmail.com>
 */
class Opoka {

    /**
     * Parametry
     * @var array
     */
    private $parametry;
    
    /**
     * Moduły
     * @var array
     */
    private $moduły;
    
    /**
     * Constructor
     * @param array $parametry parametry
     */
    public function __construct($parametry = array()) {
        $this->parametry = array();
        $this->moduły = array();
        $this->załadujDomyślneParametry();
        $this->załadujParametryUżytkownika($parametry);
        $this->załadujModuły();
    }

    /**
     * Uruchom bibliotekę
     */
    public function uruchomBibliotekę() {
        foreach($this->moduły as $moduł){
            $moduł->uruchom();
        }
    }

    /**
     * Załaduj parametry użytkownika
     * @param array $parametry parametry
     */
    private function załadujParametryUżytkownika($parametry) {
        $this->parametry = array_merge($this->parametry, $parametry);
    }

    /**
     * Załaduj moduły
     */
    private function załadujModuły() {
        array_push($this->moduły, new AntySelenium($this->parametry));
    }

    /**
     * Załaduj domyślne parametry
     */
    private function załadujDomyślneParametry() {
        $this->parametry = array_merge($this->parametry, array('antyselenium.detektorselenium.funkcjawlaczona' => true));
    }

}
