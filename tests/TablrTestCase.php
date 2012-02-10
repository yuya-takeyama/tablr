<?php
class TablrTestCase extends PHPUnit_Framework_TestCase
{
    public function assertEqualsAsRow($expected, $actual, $message = NULL)
    {
        $this->assertEquals(new Tablr_Row($expected), $actual, $message);
    }
}
