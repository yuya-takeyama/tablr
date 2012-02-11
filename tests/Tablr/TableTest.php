<?php
require_once 'Tablr/Table.php';

class Tablr_TableTest extends TablrTestCase
{
    /**
     * @test
     */
    public function getHeader_returns_keys_of_the_first_row_initially()
    {
        $table = new Tablr_Table(array(
            array('foo' => 1, 'bar' => 2, 'baz' => 3)
        ));
        $this->assertEquals(array('foo', 'bar', 'baz'), $table->getHeader());
    }

    /**
     * @test
     */
    public function getHeader_returns_header_columns_as_array()
    {
        $table = new Tablr_Table;
        $header = array('foo', 'bar', 'baz');
        $table->setHeader($header);
        $this->assertEqualsAsRow($header, $table->getHeader());
    }

    /**
     * @test
     */
    public function offsetGet_should_return_Row()
    {
        $row   = array('foo' => 1, 'bar' => 2, 'baz' => 2);
        $table = new Tablr_Table(array($row));
        $this->assertEqualsAsRow($row, $table[0]);
    }
}
