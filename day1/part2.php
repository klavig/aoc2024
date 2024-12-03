<?php

$leftList = $rightList = [];

foreach (file(__DIR__ . '/input.txt') as $line) {
    sscanf($line, "%d   %d", $left, $right);

    $leftList[] = $left;
    $rightList[] = $right;
}

$leftList = array_unique($leftList);

sort($leftList);
sort($rightList);

$score = 0;
for ($i = 0; $i < count($leftList); $i++) {
    $score += $leftList[$i] * count(array_intersect($rightList, [$leftList[$i]]));
}

echo $score;