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
 * Average aggregator.
 *
 * @author Yuya Takeyama
 */
class Tablr_Aggregator_Average
{
    public function aggregate($cells)
    {
        $cnt = 0;
        $sum = 0;
        foreach ($cells as $cell) {
            $sum += $cell;
            $cnt++;
        }
        return $sum / $cnt;
    }

    public static function getDefaultName()
    {
        return 'Average';
    }
}
