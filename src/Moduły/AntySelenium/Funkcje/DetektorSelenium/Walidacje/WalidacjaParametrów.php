<?php

namespace NaCzescJezusa\Opoka\Moduły\AntySelenium\Funkcje\DetektorSelenium\Walidacje;

use NaCzescJezusa\Opoka\Interfejsy\IWalidacjaParametrów;
use NaCzescJezusa\Opoka\Błędy\BłądWalidacjiParametrów;

/**
 * Walidacja parametrów
 * 
 * 
 * @package    NaCzescJezusa
 * @subpackage Opoka\Moduły\AntySelenium\Funkcje\DetektorSelenium\Walidacje
 * @author     Karol Golec <naczescjezusa@gmail.com>
 * @implements CacheInterface
 */
class WalidacjaParametrów implements IWalidacjaParametrów {

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
     * Uruchom walidację
     */
    public function walidacja() {
            
    }

}
