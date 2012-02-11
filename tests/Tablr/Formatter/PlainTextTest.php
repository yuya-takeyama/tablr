<?php
require_once 'Tablr/Formatter/PlainText.php';

class Tablr_Formatter_PlainTextTest extends TablrTestCase
{
    /**
     * @var Tablr_Formatter_PlainText
     */
    protected $formatter;

    public function setUp()
    {
        $this->formatter = new Tablr_Formatter_PlainText;
    }

    /**
     * @test
     */
    public function format_should_return_table_as_text()
    {
        $table = $this->createTable(array(
            array('foo' => 'FOO'),
        ));
        $this->assertEquals(
            "|foo|\n" .
            "|FOO|\n",
            $this->formatter->format($table)
        );
    }

    /**
     * @test
     */
    public function format_should_expand_cells_as_size_of_longest_cell()
    {
        $this->markTestIncomplete();
        $table = $this->createTable(array(
            array('foo' => 'a'),
        ));
        $this->assertEquals(
            "|foo|\n" .
            "|a  |\n",
            $this->formatter->format($table)
        );
    }

    /**
     * @test
     * @dataProvider provideTableAndExpectedSizes
     */
    public function getCellSizes_should_be_the_longest_size_of_each_colomuns($table, $sizes)
    {
        $this->assertEquals($sizes, $this->formatter->getCellSizes($table));
    }

    public function provideTableAndExpectedSizes()
    {
        return array(
            array(
                $this->createTable(array(
                    array('foo' => 'FOO'),
                )),
                array(3),
            )
        );
    }
}
