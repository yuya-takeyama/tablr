<?php
class Tablr_Row implements IteratorAggregate, ArrayAccess
{
    /**
     * Cells.
     *
     * @var array
     */
    protected $_cells;

    public function __construct($cells)
    {
        $this->_cells = $cells;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->_cells);
    }

    public function offsetSet($key, $value)
    {
        throw new BadMethodCallException(__METHOD__ . ' is immutable.');
    }

    public function offsetGet($key)
    {
        return $this->_cells[$key];
    }

    public function offsetExists($key)
    {
        return isset($this->_cells[$key]);
    }

    public function offsetUnset($key)
    {
        throw new BadMethodCallException(__METHOD__ . ' is immutable.');
    }

    public function isHeader()
    {
        return false;
    }

    public function isBody()
    {
        return true;
    }

    public function isFooter()
    {
        return false;
    }

    public function toArray()
    {
        return $this->_cells;
    }
}
