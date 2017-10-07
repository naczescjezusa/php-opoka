<?php

namespace NaCzescJezusa\Opoka\Interfejsy;

/**
 * Interfejs IModuł
 * 
 * 
 * @package    NaCzescJezusa
 * @subpackage Opoka\Interfejsy
 * @author     Karol Golec <naczescjezusa@gmail.com>
 */
interface IModuł {
    
    /**
     * Uruchom moduł
     */
    public function uruchom();
    
    /**
     * Załaduj funkcje
     */
    public function załadujFunkcje();
    
}