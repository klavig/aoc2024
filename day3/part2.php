<?php

$contents = file_get_contents(__DIR__ . '/input.txt');

$answer = 0;
$multiply = true;

for ($i = 0; $i < strlen($contents); $i++) {
    if (substr($contents, $i, 7) === 'don\'t()') {
        $multiply = false;
        continue;
    } elseif (substr($contents, $i, 4) === 'do()') {
        $multiply = true;
        continue;
    }

    if (substr($contents, $i, 3) === 'mul') {
        $rest = substr($contents, $i);

        if ($multiply) {
            $matches = [];
            preg_match_all('~^mul\((?<lhs>[0-9]+),(?<rhs>[0-9]+)\)~', $rest, $matches);

            foreach ($matches['lhs'] as $j => $lhs) {
                $answer += $lhs * $matches['rhs'][$j];
            }
        }
    }
}

echo $answer;