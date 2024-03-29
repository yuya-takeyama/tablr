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
 * Sum aggregator.
 *
 * @author Yuya Takeyama
 */
class Tablr_Aggregator_Sum
{
    public function aggregate($cells)
    {
        $sum = 0;
        foreach ($cells as $cell) {
            $sum += $cell;
        }
        return $sum;
    }

    public static function getDefaultName()
    {
        return 'Sum';
    }
}
