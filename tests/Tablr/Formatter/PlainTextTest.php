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
}
