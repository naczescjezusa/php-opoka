<?php

namespace NaCzescJezusa\Opoka\Interfejsy;

/**
 * Interfejs IFunkcja
 * 
 * 
 * @package    NaCzescJezusa
 * @subpackage Opoka\Interfejsy
 * @author     Karol Golec <naczescjezusa@gmail.com>
 */
interface IFunkcja {
    
    /**
     * Uruchom funkcję
     */
    public function uruchom();
    
    /**
     * Walidacja parametrów
     */
    public function walidacjaParametrów();
    
    /**
     * Sprawdza aktywność funkcji
     */
    public function jestWłączona();
}