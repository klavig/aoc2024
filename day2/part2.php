<?php

function isReportSafe(array $report): bool {
    for ($i = 1, $direction = null; $i < count($report); $i++) {
        $diff = $report[$i] - $report[$i - 1];
        if ($diff < -3 || $diff > 3 || $diff === 0) {
            return false;
        }
        $currentDirection = $diff > 0 ? 1 : -1;
        if ($direction === null) {
            $direction = $currentDirection;
        } elseif ($currentDirection !== $direction) {
            return false;
        }
    }
    return true;
}

function isReportSafeWithDamper(array $report): bool {
    for ($i = 0; $i < count($report); $i++) {
        $modified = array_values(array_diff_key($report, [$i => $report[$i]]));
        if (isReportSafe($modified)) {
            return true;
        }
    }
    return false;
}

$safe = 0;

foreach (file(__DIR__ . '/input.txt') as $line) {
    $levels = array_map('intval', explode(' ', $line));

    if (isReportSafe($levels) || isReportSafeWithDamper($levels)) {
        $safe++;
    }
}

echo $safe;