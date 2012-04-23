<?php
require_once 'Tablr/Formatter/Tsv.php';

class Tablr_Formatter_TsvTest extends TablrTestCase
{
    private $formatter;

    public function setUp()
    {
        $this->formatter = new Tablr_Formatter_Tsv;
    }

    /**
     * @test
     * @dataProvider provideTableAndExpectedText
     */
    public function format_should_return_table_as_tsv($table, $expected)
    {
        $this->assertEquals($expected, $this->formatter->format($table));
    }

    public function provideTableAndExpectedText()
    {
        return array(
            array(
                $this->createTable(array(
                    array('foo' => 'FOO'),
                )),
                "foo\n" .
                "FOO\n"
            ),
            array(
                $this->createTable(array(
                    array('foo' => 'FOO'),
                    array('foo' => 'BAR'),
                )),
                "foo\n" .
                "FOO\n" .
                "BAR\n"
            ),
            array(
                $this->createTable(array(
                    array('foo' => 'FOO', 'bar' => 'BAR', 'baz' => 'BAZ'),
                )),
                "foo\tbar\tbaz\n" .
                "FOO\tBAR\tBAZ\n"
            ),
        );
    }
}
