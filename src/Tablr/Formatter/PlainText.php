<?php
class Tablr_Formatter_PlainText
{
    public function format($table)
    {
        $sizes = $this->getCellSizes($table);
        $result = '';
        $result .= '|';
        foreach ($table->getHeader() as $i => $cell) {
            $result .= str_pad($cell, $sizes[$i], ' ', STR_PAD_RIGHT) . '|';
        }
        $result .= "\n";
        foreach ($table as $row) {
            $result .= "|";
            $i = 0;
            foreach ($row as $cell) {
                $result .= str_pad($cell, $sizes[$i], ' ', STR_PAD_RIGHT) . '|';
                $i++;
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

    /**
     * Multi-byte enabled str_pad().
     *
     * @param  string $input
     * @param  int    $size
     * @param  string $padWith
     * @param  int    $type    STR_PAD_RIGHT | STR_PAD_LEFT | STR_PAD_BOTH
     * @return string
     */
    public static function getPaddedString($input, $size, $padWith, $type = STR_PAD_RIGHT)
    {
        return str_pad($input, $size, $padWith, $type);
    }
}
