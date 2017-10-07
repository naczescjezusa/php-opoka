<?php

namespace NaCzescJezusa\Opoka\Moduły\AntySelenium;

use NaCzescJezusa\Opoka\Interfejsy\IModuł;
use NaCzescJezusa\Opoka\Moduły\AntySelenium\Funkcje\DetektorSelenium\DetektorSelenium;

/**
 * Opoka
 * 
 * 
 * @package    NaCzescJezusa
 * @subpackage Opoka\Moduły\AntySelenium
 * @author     Karol Golec <naczescjezusa@gmail.com>
 * @implements CacheInterface
 */
class AntySelenium implements IModuł{

    /**
     * Parametry
     * @var array
     */
    private $parametry;
    
    /**
     * Funkcje
     * @var array
     */
    private $funkcje;
    
    /**
     * Constructor
     * @param array $parametry parametry
     */
    public function __construct($parametry) {
        $this->parametry = $parametry;
        $this->funkcje = array();
        $this->załadujFunkcje();
    }

    /**
     * Uruchom moduł
     */
    public function uruchom() {
        foreach($this->funkcje as $funkcja){
            $funkcja->uruchom();
        }
    }
    
    /**
     * Załaduj funkcje
     */
    public function załadujFunkcje() {
        array_push($this->funkcje, new DetektorSelenium($this->parametry));
    }
    
}
