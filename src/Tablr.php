<?php
require_once 'Tablr/Table.php';

class Tablr
{
    /**
     * Creates Table object.
     *
     * @return Tablr_Table
     */
    public function createTable()
    {
        return new Tablr_Table;
    }
}
