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
 * Header row.
 *
 * @author Yuya Takeyama
 */
class Tablr_HeaderRow extends Tablr_Row
{
    public function isHeader()
    {
        return true;
    }

    public function isBody()
    {
        return false;
    }
}
