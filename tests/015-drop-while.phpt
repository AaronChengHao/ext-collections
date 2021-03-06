--TEST--
Test Collection::dropWhile() and Collection::dropLastWhile().
--FILE--
<?php
$collection = Collection::init([5, 7, 1, 4, 3]);
$collection1 = $collection->dropWhile(function ($value) {
    return $value % 2;
});
if ($collection1->toArray() != [3 => 4, 4 => 3])
    echo 'Collection::dropWhile() failed.', PHP_EOL;
$collection2 = $collection->dropLastWhile(function ($value) {
    return $value < 6;
});
if ($collection2->toArray() != [5, 7])
    echo 'Collection::dropLastWhile() failed.', PHP_EOL;
?>
--EXPECT--
