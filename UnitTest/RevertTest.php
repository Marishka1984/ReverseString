<?php
namespace UnitTest;

require_once 'Class/Revert.php';
use PHPUnit\Framework\TestCase;


class RevertTest extends TestCase
{
    private $revert;

    protected function setUp() : void
    {
        $this->revert = new Revert;
        $this->revert->setString("Cat houSe elEpHant! cat, is 'cold' now third-part can`t");
    }

    public function testRevString()
    {
        $this->assertEquals("Tac esuOh tnAhPele! tac, si 'dloc' won driht-trap nac`t", $this->revert->revString($this->revert->getString()));
    }
}