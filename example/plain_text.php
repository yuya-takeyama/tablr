<?php
set_include_path(dirname(__FILE__) . '/../src' . PATH_SEPARATOR . get_include_path());
require_once 'Tablr.php';
require_once 'Tablr/Formatter/PlainText.php';

$tablr = new Tablr;
$table = $tablr->createTable(array(
    array('year-month' => '2011/01', 'registered' =>  100, 'retired' => 10, 'total' =>   90),
    array('year-month' => '2011/02', 'registered' =>  200, 'retired' => 40, 'total' =>  250),
    array('year-month' => '2011/03', 'registered' =>  140, 'retired' => 90, 'total' =>  300),
    array('year-month' => '2011/04', 'registered' => 1300, 'retired' => 15, 'total' => 1785),
));
$table->setHeader(array('年月', '入会数', '退会数', '合計会員数'));
echo $table->format(new Tablr_Formatter_PlainText);
