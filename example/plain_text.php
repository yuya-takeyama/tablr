<?php
set_include_path(dirname(__FILE__) . '/../src' . PATH_SEPARATOR . get_include_path());
require_once 'Tablr.php';
require_once 'Tablr/Formatter/PlainText.php';
require_once 'Tablr/Aggregator/Average.php';
require_once 'Tablr/Aggregator/Sum.php';

$table = new Tablr_Table(array(
    array('year-month' => '2011/01', 'registered' =>  100, 'retired' =>  10, 'inc_dec' =>   90),
    array('year-month' => '2011/02', 'registered' =>  200, 'retired' =>  40, 'inc_dec' =>  160),
    array('year-month' => '2011/03', 'registered' =>  140, 'retired' => 190, 'inc_dec' =>  -50),
    array('year-month' => '2011/04', 'registered' => 1300, 'retired' =>  15, 'inc_dec' => 1285),
));
$table->setHeader(array('Month', 'Registered', 'Retired', 'Inc/Dec'));

$table->addAggregator(new Tablr_Aggregator_Average);
$table->addAggregator(new Tablr_Aggregator_Sum);

echo $table->format(new Tablr_Formatter_PlainText);
