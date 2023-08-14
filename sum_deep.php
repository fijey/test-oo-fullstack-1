<?php
function calculate_sum($node, $targetChar, $level) {
    $sum = 0;
    foreach ($node as $item) {
        if (is_array($item)) {
            $sum += calculate_sum($item, $targetChar, $level + 1);
        } elseif (is_string($item) && strpos($item, $targetChar) !== false) {
            $sum += $level;
        }
    }
    return $sum;
}

function sum_deep($tree, $char) {
    $totalSum = 0;
    for ($i = 0; $i < strlen($char); $i++) {
        $totalSum += calculate_sum($tree, $char[$i], 1) * ($i + 1);
    }
    
    return $totalSum;
}

// Test cases
$testCases = [
    [["AB", ["XY"], ["YP"]], 'Y'], // Output: 4
    [["", ["", ["XXXXX"]]], 'X'], // Output: 3
    [["X"], 'X'], // Output: 1
    [[""], 'X'], // Output: 0
    [["X", ["", ["", ["Y"], ["X"]]], ["X", ["", ["Y"], ["Z"]]]], 'X'], // Output: 7
    [["ABAH", ["CIRCA"], ["CRUMP", ["IRA"]], ["ALI"]], "ACI"], // Output: 37
];

foreach ($testCases as $idx => $testCase) {
    $result = sum_deep($testCase[0], $testCase[1]);

    echo "Test case " . ($idx + 1) . ": " . $result . "\n";
}
