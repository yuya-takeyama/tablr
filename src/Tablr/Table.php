<?php
/**
 * Tablr.
 *
 * Simple toolkit for 2-dimensional tables.
 *
 * @author Yuya Takeyama
 * @link   https://github.com/yuya-takeyama/tablr
 */
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
     * Footer rows.
     *
     * @var array
     */
    protected $_footerRows = array();

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

    public function getFooterRows()
    {
        return $this->_footerRows;
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

    /**
     * Gets iterator contains header, body and footer rows.
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator(array_merge(
            array($this->getHeader()),
            $this->_rows,
            $this->_footerRows
        ));
    }

    /**
     * Gets formatted output.
     *
     * Formatting is delegated to specified formatter.
     *
     * @param
     * @return string
     */
    public function format($formatter)
    {
        return $formatter->format($this);
    }

    public function addAggregator($aggregator, $name = NULL)
    {
        $columnCount = count($this->_header->toArray());
        $cells = array();
        $cells[0] = $name ? $name : $aggregator->getDefaultName();
        for ($key = 1; $key < $columnCount; $key++) {
            $values = array();
            foreach ($this->_rows as $row) {
                $values[] = $row[$key];
            }
            $cells[] = $aggregator->aggregate($values);
        }
        $this->_footerRows[] = new Tablr_FooterRow($cells);
    }
}
