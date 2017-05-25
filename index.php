<?php

require __DIR__ . '/vendor/autoload.php';

use Yoda\DB;

$test = DB::table('test')->where('test', '>', 32000)->get(['test']);
var_dump($test);