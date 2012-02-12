<?php
require_once 'Tablr/Aggregator/Sum.php';

class Tablr_Aggregator_SumTest extends TablrTestCase
{
    /**
     * @test
     */
    public function aggregate_should_be_sum_of_input_values()
    {
        $aggregator = new Tablr_Aggregator_Sum;
        $this->assertEquals(15, $aggregator->aggregate(array(1, 2, 3, 4, 5)));
    }
}
