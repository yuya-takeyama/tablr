<?php
require_once dirname(__FILE__) . '/Row.php';

class Tablr_Table
{
    /**
     * Header columns.
     *
     * @var array
     */
    protected $_header;

    /**
     * Rows.
     *
     * @var array
     */
    protected $_rows;

    /**
     * Constructor.
     *
     * @param array $rows Collection of hash table.
     */
    public function __construct($rows = array())
    {
        foreach ($rows as $row) {
            $this->addRow(new Tablr_Row($row));
        }
    }

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

    /**
     * Adds a row.
     *
     * @param  array|Tablr_Row $row
     * @return void
     */
    public function addRow($row)
    {
        if ($row instanceof Tablr_Row) {
            $this->_rows[] = $row;
        } else {
            $this->_rows[] = new Tablr_Row($row);
        }
    }
}
