<?php
require_once 'Tablr/Table.php';
require_once 'Tablr/Aggregator/Sum.php';

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
        $this->assertEqualsAsRow(array('foo', 'bar', 'baz'), $table->getHeader());
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
        $this->markTestIncomplete();
        $row   = array('foo' => 1, 'bar' => 2, 'baz' => 2);
        $table = new Tablr_Table(array($row));
        $this->assertEqualsAsRow($row, $table[0]);
    }

    /**
     * @test
     */
    public function getFooterRows_should_be_empty_array_by_default()
    {
        $table = new Tablr_Table;
        $this->assertEquals(array(), $table->getFooterRows());
    }

    /**
     * @test
     */
    public function getFooterRows_should_be_sum_of_each_column_if_Sum_aggregator_is_set()
    {
        $table = new Tablr_Table(array(
            array('month' => '1', 'registered' => 10, 'retired' =>  5),
            array('month' => '2', 'registered' => 25, 'retired' => 10),
            array('month' => '3', 'registered' => 40, 'retired' =>  5),
        ));
        $table->addAggregator(new Tablr_Aggregator_Sum);
        $footerRows = $table->getFooterRows();
        $sumRow = $footerRows[0];
        $this->assertEqualsAsRow(
            array('Sum', 75, 20),
            $sumRow
        );
    }
}
