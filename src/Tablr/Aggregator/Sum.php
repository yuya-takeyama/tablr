<?php
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
