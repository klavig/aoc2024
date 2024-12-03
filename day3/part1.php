<?php

$contents = file_get_contents(__DIR__ . '/input.txt');

$matches = [];
preg_match_all('~mul\((?<lhs>[0-9]+),(?<rhs>[0-9]+)\)~', $contents, $matches);

$answer = 0;
foreach ($matches['lhs'] as $i => $lhs) {
    $answer += $lhs * $matches['rhs'][$i];
}

echo $answer;