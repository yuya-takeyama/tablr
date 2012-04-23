<?php
/**
 * Tablr.
 *
 * Simple toolkit for 2-dimensional tables.
 *
 * @author Yuya Takeyama
 * @link   https://github.com/yuya-takeyama/tablr
 */

/**
 * TSV formatter.
 *
 * @author Yuya Takeyama
 */
class Tablr_Formatter_Tsv
{
    /**
     * @TODO escape
     */
    public function format($table)
    {
        $result = '';
        foreach ($table as $row) {
            $cells = array();
            foreach ($row as $cell) {
                $cells[] = $cell;
            }
            $result .= join("\t", $cells) . "\n";
        }
        return $result;
    }
}
