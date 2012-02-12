Tablr
=====

Simple toolkit for 2-dimensional tables.

Synopsis
--------

```php
<?php
// Create table from 2-dimensional array.
$table = new Tablr_Table(array(
    array('month' => '2011/01', 'registered' =>  100, 'retired' =>  10, 'inc_dec' =>   90),
    array('month' => '2011/02', 'registered' =>  200, 'retired' =>  40, 'inc_dec' =>  160),
    array('month' => '2011/03', 'registered' =>  140, 'retired' => 190, 'inc_dec' =>  -50),
));
$table->setHeader(array('Month', 'Registered', 'Retired', 'Inc/Dec'));

// Adds some aggregator.
$table->addAggregator(new Tablr_Aggregator_Average);
$table->addAggregator(new Tablr_Aggregator_Sum);

// Outputs as plain text formatted table.
echo $table->format(new Tablr_Formatter_PlainText);
```

LICENSE
-------

The MIT LicenSE

Author
------

Yuya Takeyama [@yuya_takeyama](http://yuyat.jp/)
