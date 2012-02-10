<?php
require_once 'Tablr/Table.php';

class Tablr
{
    /**
     * Creates Table object.
     *
     * @return Tablr_Table
     */
    public function createTable($rows = array())
    {
        return new Tablr_Table($rows);
    }
}
