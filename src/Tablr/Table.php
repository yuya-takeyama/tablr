<?php
class Tablr_Table
{
    /**
     * Header columns.
     *
     * @var array
     */
    protected $_header;

    /**
     * Sets header columns.
     *
     * @param  array $header
     * @return void
     */
    public function setHeader($header)
    {
        $this->_header = $header;
    }

    /**
     * Gets header column.
     *
     * @return array
     */
    public function getHeader()
    {
        return $this->_header;
    }
}
