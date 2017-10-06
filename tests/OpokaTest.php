<?php
 
use NaCzescJezusa\Opoka\Opoka;
 
class OpokaTest extends PHPUnit_Framework_TestCase {
 
  public function testOpokaMaSzkielet()
  {
    $opoka = new Opoka;
    $this->assertTrue($opoka->maSzkielet());
  }
 
}