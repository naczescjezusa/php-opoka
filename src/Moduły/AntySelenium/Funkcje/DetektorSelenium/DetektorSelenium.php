<?php

namespace NaCzescJezusa\Opoka\Moduły\AntySelenium\Funkcje\DetektorSelenium;

use NaCzescJezusa\Opoka\Interfejsy\IFunkcja;
use NaCzescJezusa\Opoka\Moduły\AntySelenium\Funkcje\DetektorSelenium\Walidacje\WalidacjaParametrów;
use NaCzescJezusa\Opoka\Błędy\BłądWalidacjiParametrów;
use NaCzescJezusa\Opoka\Moduły\AntySelenium\Funkcje\DetektorSelenium\Serwisy\DetektorSeleniumSerwis;

/**
 * Opoka
 * 
 * 
 * @package    NaCzescJezusa
 * @subpackage Opoka\Moduły\AntySelenium\Funkcje\DetektorSelenium
 * @author     Karol Golec <naczescjezusa@gmail.com>
 * @implements CacheInterface
 */
class DetektorSelenium implements IFunkcja {

    /**
     * Parametry
     * @var array
     */
    private $parametry;
    
    /**
     *Detektor selenium serwis
     * @var DetektorSeleniumSerwis 
     */
    private $detektorSeleniumSerwis;

    /**
     * Constructor
     * @param array $parametry parametry
     */
    public function __construct($parametry) {
        $this->parametry = $parametry;
        $this->detektorSeleniumSerwis = new DetektorSeleniumSerwis($this->parametry);
    }

    /**
     * Uruchom
     */
    public function uruchom() {
        if (!$this->jestWłączona()) {
            return;
        }
        $this->walidacjaParametrów();
        $wykrytoSelenium = $this->detektorSeleniumSerwis->wykryj();
    }

    /**
     * Walidacja parametrów
     */
    public function walidacjaParametrów() {
        $walidacjaParametrów = new WalidacjaParametrów($this->parametry);
        $walidacjaParametrów->walidacja();
    }

    /**
     * Sprawdza aktywność funkcji
     * @return bool true jeśli włączona lub false jeśli wyłączona
     * @throws BłądWalidacjiParametrów 
     */
    public function jestWłączona() {
        if (!isset($this->parametry['antyselenium.detektorselenium.funkcjawlaczona']))
            throw new BłądWalidacjiParametrów('Brak parametru "antyselenium.detektorselenium.funkcjawlaczona"');
        return $this->parametry['antyselenium.detektorselenium.funkcjawlaczona'];
    }

}
