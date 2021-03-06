--TEST--
Test implementation of interface ArrayAccess.
--FILE--
<?php
$array = ['a' => 'b', 'c' => 'd', 'e' => ['f' => 'g']];
$collection = Collection::init($array);
$collection['a'] = 'foo';
$collection['h'] = 'bar';
unset($collection['c']);
if (empty($collection) || isset($collection['t']) || !isset($collection['e']))
    echo 'Test for handlers.has_dimension failed.', PHP_EOL;
if ($collection['e']['f'] != 'g')
    echo 'Test for handlers.read_dimension failed.', PHP_EOL;
if ($collection['a'] != 'foo' || $collection['h'] != 'bar')
    echo 'Test for handlers.write_dimension failed.', PHP_EOL;
if (isset($collection['c']))
    echo 'Test for handlers.unset_dimension failed.', PHP_EOL;
?>
--EXPECT--
