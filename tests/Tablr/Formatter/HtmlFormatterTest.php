<?php
require_once 'Tablr/Formatter/Html.php';

class Tablr_Formatter_HtmlFormatterTest extends TablrTestCase
{
    /**
     * @test
     * @dataProvider provideTableAndExpectedHtml
     */
    public function format_returns_html_formatted_table_correctly($table, $html)
    {
        $formatter = new Tablr_Formatter_Html;
        $this->assertXmlStringEqualsXmlString($html, $formatter->format($table));
    }

    public function provideTableAndExpectedHtml()
    {
        return array(
            array(
                $this->createTable(array(
                    array('foo' => 'FOO'),
                )),
                "<table>\n" .
                "  <thead>\n" .
                "    <tr>\n" .
                "      <th>foo</th>\n" .
                "    </tr>\n" .
                "  </thead>\n" .
                "  <tbody>\n" .
                "    <tr>\n" .
                "      <td>FOO</td>\n" .
                "    </tr>\n" .
                "  </tbody>\n" .
                "</table>\n"
            )
        );
    }
}
