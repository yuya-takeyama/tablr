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
 * Row.
 *
 * A row contains some cells.
 *
 * @author Yuya Takeyama
 */
class Tablr_Row implements IteratorAggregate, ArrayAccess
{
    /**
     * Cells.
     *
     * @var array
     */
    protected $_cells;

    /**
     * Constructor.
     *
     * @param array|Traversable $cells
     */
    public function __construct($cells)
    {
        $this->_cells = array();
        foreach ($cells as $cell) {
            $this->_cells[] = $cell;
        }
    }

    /**
     * Gets iterator contains all cells in row.
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->_cells);
    }

    /**
     * Setter is disabled.
     */
    public function offsetSet($key, $value)
    {
        throw new BadMethodCallException(__METHOD__ . ' is immutable.');
    }

    /**
     * Getter.
     *
     * @param  int $key Numeric key.
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->_cells[$key];
    }

    /**
     * Whether the key exists.
     *
     * @param  int $key Numeric key.
     * @return bool
     */
    public function offsetExists($key)
    {
        return isset($this->_cells[$key]);
    }

    /**
     * unset is disabled.
     */
    public function offsetUnset($key)
    {
        throw new BadMethodCallException(__METHOD__ . ' is immutable.');
    }

    /**
     * Whether the row is header.
     *
     * @return bool
     */
    public function isHeader()
    {
        return false;
    }

    /**
     * Whether the row is body.
     *
     * @return bool
     */
    public function isBody()
    {
        return true;
    }

    /**
     * Whether the row is footer.
     *
     * @return bool
     */
    public function isFooter()
    {
        return false;
    }

    /**
     * Values that the row's cells have..
     *
     * @return array
     */
    public function toArray()
    {
        return $this->_cells;
    }
}
