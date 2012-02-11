<?php
require_once dirname(__FILE__) . '/Row.php';
require_once dirname(__FILE__) . '/HeaderRow.php';
require_once dirname(__FILE__) . '/FooterRow.php';

class Tablr_Table implements ArrayAccess, IteratorAggregate
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
            $this->addRow($row);
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
        $this->_header = new Tablr_HeaderRow($header);
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
        if (is_null($this->_header)) {
            $this->_setHeaderFromRow($row);
        }
        if ($row instanceof Tablr_Row) {
            $this->_rows[] = $row;
        } else {
            $this->_rows[] = new Tablr_Row($row);
        }
    }

    protected function _setHeaderFromRow($row)
    {
        $this->setHeader(array_keys($row));
    }

    public function offsetSet($key, $value)
    {
        throw new BadMethodCallException(__METHOD__ . ' is immutable.');
    }

    public function offsetGet($key)
    {
        return $this->_rows[$key];
    }

    public function offsetExists($key)
    {
        return isset($this->_rows[$key]);
    }

    public function offsetUnset($key)
    {
        throw new BadMethodCallException(__METHOD__ . ' is immutable.');
    }

    public function getIterator()
    {
        return new ArrayIterator(array_merge(array($this->getHeader()), $this->_rows));
    }

    public function format($formatter)
    {
        return $formatter->format($this);
    }
}
