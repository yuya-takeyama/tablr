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
}
