<?php
require_once 'Tablr/Table.php';

class Tablr_TableTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function getHeader_returns_header_columns_as_array()
    {
        $table = new Tablr_Table;
        $header = array('foo', 'bar', 'baz');
        $table->setHeader($header);
        $this->assertEquals($header, $table->getHeader());
    }
}
