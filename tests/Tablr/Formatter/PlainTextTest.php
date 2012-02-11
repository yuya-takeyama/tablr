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
     */
    public function format_should_expand_cells_correctly_if_multibyte_chars_are_included()
    {
        $this->markTestIncomplete();
        $table = $this->createTable(array(
            array('foo' => 'あいうえお', 'bar' => 'あ'),
        ));
        $this->assertEquals(
            "|foo       |bar|\n" .
            "|あいうえお|あ |\n",
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
            ),
            array(
                $this->createTable(array(
                    array('foo' => 'a'),
                )),
                array(3),
            ),
            array(
                $this->createTable(array(
                    array('foo' => 'foobar'),
                )),
                array(6),
            ),
            array(
                $this->createTable(array(
                    array('foo' => 'FOO', 'foobar' => 'FOOBAR'),
                )),
                array(3, 6),
            ),
            array(
                $this->createTable(array(
                    array('foo' => 'あいうえお'),
                )),
                array(10),
            ),
        );
    }

    /**
     * @test
     * @dataProvider provideGetPaddedStringInputsAndOutput
     */
    public function getPaddedString_should_pads_input_with_string($input, $size, $padWith, $type, $expected)
    {
        $this->assertEquals(
            $expected,
            $this->formatter->getPaddedString($input, $size, $padWith, $type)
        );
    }

    public function provideGetPaddedStringInputsAndOutput()
    {
        return array(
            array('a', 5, ' ', STR_PAD_RIGHT, 'a    '),
            array('a', 5, ' ', STR_PAD_LEFT,  '    a'),
            array('a', 5, ' ', STR_PAD_BOTH,  '  a  '),
            array('a', 4, ' ', STR_PAD_BOTH,  ' a  '),
            array('あ', 4, ' ', STR_PAD_RIGHT, 'あ  '),
            array('あ', 4, ' ', STR_PAD_LEFT,  '  あ'),
            array('あ', 4, ' ', STR_PAD_BOTH,  ' あ '),
            array('あ', 5, ' ', STR_PAD_BOTH,  ' あ  '),
        );
    }
}
