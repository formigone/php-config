<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Formigone\Config;

$env = getenv('APP_ENV') ?: 'development';

$config = new Config($env, __DIR__);

$all = $config->get();
echo '<', $env, '>  all:', PHP_EOL;
print_r($all);
echo PHP_EOL, '- - - - - - -', PHP_EOL;

$only = $config->get('devOnly');
echo '<', $env, '>  devOnly:', PHP_EOL;
print_r($only);
echo PHP_EOL, '- - - - - - -', PHP_EOL;

$numbers = $config->get('numbers');
echo '<', $env, '>  numbers:', PHP_EOL;
print_r($numbers);
echo PHP_EOL, '- - - - - - -', PHP_EOL;

$vals = $config->get('numbers.values');
echo '<', $env, '>  numbers.values:', PHP_EOL;
print_r($vals);
echo PHP_EOL, '- - - - - - -', PHP_EOL;


$d5 = $config->get('d5');
echo '<', $env, '>  d5:', PHP_EOL;
print_r($d5);
echo PHP_EOL, '- - - - - - -', PHP_EOL;

$d4 = $config->get('d5.d4');
echo '<', $env, '>  d5.d4:', PHP_EOL;
print_r($d4);
echo PHP_EOL, '- - - - - - -', PHP_EOL;

$d3 = $config->get('d5.d4.d3');
echo '<', $env, '>  d5.d4.d3:', PHP_EOL;
print_r($d3);
echo PHP_EOL, '- - - - - - -', PHP_EOL;

$d2 = $config->get('d5.d4.d3.d2');
echo '<', $env, '>  d5.d4.d3.d2:', PHP_EOL;
print_r($d2);
echo PHP_EOL, '- - - - - - -', PHP_EOL;

$d1 = $config->get('d5.d4.d3.d2.d1');
echo '<', $env, '>  d5.d4.d3.d2.d1:', PHP_EOL;
print_r($d1);
echo PHP_EOL, '- - - - - - -', PHP_EOL;


$db = $config->get('db');
echo '<', $env, '>  db:', PHP_EOL;
print_r($db);
echo PHP_EOL, '- - - - - - -', PHP_EOL;

$shouldCacheViews = (int)$config->get('app.views.cache');
echo '<', $env, '>  app.views.cache:', PHP_EOL;
print_r($shouldCacheViews);
echo PHP_EOL, '- - - - - - -', PHP_EOL;
