<?php
class Tablr_Formatter_PlainText
{
    public function format($table)
    {
        $result = '';
        $result .= '|' . join('|', $table->getHeader()) . "|\n";
        foreach ($table as $row) {
            $result .= "|";
            foreach ($row as $cell) {
                $result .= "{$cell}|";
            }
            $result .= "\n";
        }
        return $result;
    }

    /**
     * Traverses all rows and gets the longest size of each columns.
     *
     * @return array
     */
    public static function getCellSizes($table)
    {
        $sizes = array();
        $header = $table->getHeader();
        foreach ($header as $cell) {
            $sizes[] = mb_strwidth($cell, 'UTF-8');
        }
        foreach ($table as $row) {
            $i = 0;
            foreach ($row as $cell) {
                $size = mb_strwidth($cell, 'UTF-8');
                if ($sizes[$i] < $size) {
                    $sizes[$i] = $size;
                }
                $i++;
            }
        }
        return $sizes;
    }
}
