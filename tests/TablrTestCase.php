<?php
require_once 'Tablr.php';

class TablrTestCase extends PHPUnit_Framework_TestCase
{
    public function assertEqualsAsRow($expected, $actual, $message = NULL)
    {
        $this->assertEquals($expected, $actual->toArray(), $message);
    }

    public function createTable($rows)
    {
        $tablr = new Tablr;
        return $tablr->createTable($rows);
    }
}
