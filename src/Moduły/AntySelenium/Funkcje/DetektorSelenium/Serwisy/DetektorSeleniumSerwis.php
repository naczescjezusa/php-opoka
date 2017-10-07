<?php

namespace NaCzescJezusa\Opoka\Moduły\AntySelenium\Funkcje\DetektorSelenium\Serwisy;

/**
 * Detektor selenium serwis
 * 
 * 
 * @package    NaCzescJezusa
 * @subpackage Opoka\Moduły\AntySelenium\Funkcje\DetektorSelenium\Serwisy
 * @author     Karol Golec <naczescjezusa@gmail.com>
 * @implements CacheInterface
 */
class DetektorSeleniumSerwis {

    /**
     * Parametry
     * @var array
     */
    private $parametry;

        /**
     * Constructor
     * @param array $parametry parametry
     */
    public function __construct($parametry) {
        $this->parametry = $parametry;
    }
    
    /**
     * Wykryj selenium
     */
    public function wykryj(){
        
    }
}
