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
 * Footer row.
 *
 * @author Yuya Takeyama
 */
class Tablr_FooterRow extends Tablr_Row
{
    public function isBody()
    {
        return false;
    }

    public function isFooter()
    {
        return true;
    }
}
