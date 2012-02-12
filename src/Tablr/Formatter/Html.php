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
 * HTML formatter.
 *
 * @author Yuya Takeyama
 */
class Tablr_Formatter_Html
{
    public function format($table)
    {
        $bodyStarted = $footerStarted = false;
        $result = '<table>';
        foreach ($table as $row) {
            if ($row->isHeader()) {
                $result .= $this->_formatHeaderRow($row);
            } else if ($row->isBody()) {
                if ($bodyStarted === false) {
                    $result .= '<tbody>';
                    $bodyStarted = true;
                }
                $result .= $this->_formatBodyRow($row);
            } else if ($row->isFooter()) {
                if ($bodyStarted) {
                    $result .= '</tbody>';
                    $bodyStarted = false;
                }
                if ($footerStarted === false) {
                    $result .= '<tfoot>';
                    $footerStarted = true;
                }
                $result .= $this->_formatFooterRow($row);
            }
        }
        if ($bodyStarted) {
            $result .= '</tbody>';
        }
        if ($footerStarted) {
            $result .= '</tfoot>';
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

    protected function _formatFooterRow($row)
    {
        return $this->_formatBodyRow($row);
    }
}
