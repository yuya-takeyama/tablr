<?php
class Tablr_Formatter_Html
{
    public function format($table)
    {
        $bodyStarted = false;
        $result = '<table>';
        foreach ($table as $row) {
            if ($row->isHeader()) {
                $result .= $this->_formatHeaderRow($row);
            } else {
                if ($bodyStarted === false) {
                    $result .= '<tbody>';
                    $bodyStarted = true;
                }
                $result .= $this->_formatBodyRow($row);
            }
        }
        if ($bodyStarted) {
            $result .= '</tbody>';
        }
        return "{$result}</table>";
    }

    protected function _formatHeaderRow($row)
    {
        $result = '<thead><tr>';
        foreach ($row as $cell) {
            $result .= '<th>' . htmlspecialchars($cell, ENT_QUOTES, 'UTF-8') . '</th>';
        }
        $result .= '</tr></thead>';
        return $result;
    }

    protected function _formatBodyRow($row)
    {
        $result = '<tr>';
        foreach ($row as $cell) {
            $result .= '<td>' . htmlspecialchars($cell, ENT_QUOTES, 'UTF-8'). '</td>';
        }
        $result .= '</tr>';
        return $result;
    }
}
