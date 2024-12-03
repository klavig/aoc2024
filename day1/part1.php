<?php

$leftList = $rightList = [];

foreach (file(__DIR__ . '/input.txt') as $line) {
    sscanf($line, "%d   %d", $left, $right);

    $leftList[] = $left;
    $rightList[] = $right;
}

sort($leftList);
sort($rightList);

$distance = 0;
for ($i = 0; $i < count($leftList); $i++) {
    $distance += abs($leftList[$i] - $rightList[$i]);
}

echo $distance;