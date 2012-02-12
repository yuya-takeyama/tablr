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
 * Plain text formatter.
 *
 * @author Yuya Takeyama
 */
class Tablr_Formatter_PlainText
{
    public function format($table)
    {
        $sizes = $this->getCellSizes($table);
        $result = '';
        foreach ($table as $row) {
            $result .= $this->_formatRow($row, $sizes);
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
        foreach ($table as $row) {
            $i = 0;
            foreach ($row as $cell) {
                $size = self::_getSizeAsString($cell);
                if (array_key_exists($i, $sizes) === false || $sizes[$i] < $size) {
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
        $inputSize = self::_getSizeAsString($input);
        if (($insufficient = $size - $inputSize) > 0) {
            $padding = str_repeat($padWith, $insufficient);
        }
        $leftLength = $rightLength = 0;
        if ($type === STR_PAD_RIGHT) {
            $rightLength = $insufficient;
        } else if ($type === STR_PAD_LEFT) {
            $leftLength = $insufficient;
        } else if ($type === STR_PAD_BOTH) {
            $leftLength = $rightLength = floor($insufficient / 2);
            if ($insufficient % 2 === 1) {
                $rightLength++;
            }
        }
        return str_repeat($padWith, $leftLength) . $input . str_repeat($padWith, $rightLength);
    }

    /**
     * Formats row as string.
     *
     * @param  Tablr_Row|array $row
     * @return string
     */
    protected function _formatRow($row, $sizes)
    {
        $result = '|';
        if ($row->isHeader()) {
            $padType = STR_PAD_BOTH;
        }
        $i = 0;
        foreach ($row as $cell) {
            if ($row->isHeader() === false) {
                $padType = $this->_getPadType($cell);
            }
            $cell = $this->_getFormattedString($cell);
            $result .= $this->getPaddedString($cell, $sizes[$i], ' ', $padType) . '|';
            $i++;
        }
        return "{$result}\n";
    }

    protected static function _getFormattedString($value)
    {
        switch (gettype($value)) {
        case 'string':
            return $value;
        case 'integer':
            return number_format($value);
        case 'double':
            return number_format($value, 2);
        }
    }

    protected static function _getSizeAsString($value)
    {
        return mb_strwidth(self::_getFormattedString($value), 'UTF-8');
    }

    protected static function _getPadType($value)
    {
        switch (gettype($value)) {
        case 'integer':
        case 'double':
            return STR_PAD_LEFT;
        default:
            return STR_PAD_RIGHT;
        }
    }
}
