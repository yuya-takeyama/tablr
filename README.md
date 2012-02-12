Tablr
=====

Simple toolkit for 2-dimensional tables.

Tablr is optimized for result set from SELECT queries to RDBMS.

Synopsis
--------

```php
<?php
// Creates table from 2-dimensional array.
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

This script outputs like below.

```
| Month |Registered|Retired|Inc/Dec|
|2011/01|       100|     10|     90|
|2011/02|       200|     40|    160|
|2011/03|       140|    190|    -50|
|Average|       435|  63.75| 371.25|
|Sum    |     1,740|    255|  1,485|
```

Features
--------

### Formatter

Formatters generate table as its formatting rule.

Currently, below formatters are available.

- Plain-text formatter
- HTML formatter

### Aggregator

Aggregators aggregate each column and add the result into footer of table.

Currently, below aggregators are available.

- Sum aggregator
- Average aggregator

LICENSE
-------

The MIT License

Author
------

Yuya Takeyama [http://yuyat.jp/](http://yuyat.jp/)
