<?php
require_once 'Tablr/Formatter/Html.php';
require_once 'Tablr/Aggregator/Average.php';
require_once 'Tablr/Aggregator/Sum.php';

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
        $dataSet = array();

        $dataSet[0] = array();
        $dataSet[0][] = $this->createTable(array(
            array('foo' => 'FOO'),
        ));
        $dataSet[0][] = "<table>\n" .
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
                        "</table>\n";

        $dataSet[1] = array();
        $table = $this->createTable(array(
            array('month' => '1', 'value' => 1),
            array('month' => '2', 'value' => 3),
        ));
        $table->addAggregator(new Tablr_Aggregator_Average);
        $table->addAggregator(new Tablr_Aggregator_Sum);
        $dataSet[1][] = $table;
        $dataSet[1][] = "<table>\n" .
                        "  <thead>\n" .
                        "    <tr>\n" .
                        "      <th>month</th>\n" .
                        "      <th>value</th>\n" .
                        "    </tr>\n" .
                        "  </thead>\n" .
                        "  <tbody>\n" .
                        "    <tr>\n" .
                        "      <td>1</td>\n" .
                        "      <td>1</td>\n" .
                        "    </tr>\n" .
                        "    <tr>\n" .
                        "      <td>2</td>\n" .
                        "      <td>3</td>\n" .
                        "    </tr>\n" .
                        "  </tbody>\n" .
                        "  <tfoot>\n" .
                        "    <tr>\n" .
                        "      <td>Average</td>\n" .
                        "      <td>2</td>\n" .
                        "    </tr>\n" .
                        "    <tr>\n" .
                        "      <td>Sum</td>\n" .
                        "      <td>4</td>\n" .
                        "    </tr>\n" .
                        "  </tfoot>\n" .
                        "</table>\n";

        return $dataSet;
    }
}
