<?php
require_once 'Tablr.php';

class TablrTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->tablr = new Tablr;
    }

    /**
     * @test
     */
    public function createTable_should_be_Table_object()
    {
        $this->assertInstanceOf('Tablr_Table', $this->tablr->createTable());
    }
}
