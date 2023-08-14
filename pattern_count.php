<?php 
function pattern_count($text, $pattern) {
    $textLength = strlen($text);
    $patternLength = strlen($pattern);
    $count = 0;

    if($pattern !== ""){
        for ($i = 0; $i <= $textLength - $patternLength; $i++) {
            $match = true;
            for ($j = 0; $j < $patternLength; $j++) {
                if ($text[$i + $j] !== $pattern[$j]) {
                    $match = false;
                    break;
                }
            }
            if ($match) {
                $count++;
            }
        }
    }

    return $count;
}

// Test cases
echo pattern_count("palindrom", "ind");    // Output: 1
echo "\n";
echo pattern_count("abakadabra", "ab") ;     // Output: 2
echo "\n";
echo pattern_count("hello", "");           // Output: 0
echo "\n";
echo pattern_count("ababab", "aba");       // Output: 2
echo "\n";
echo pattern_count("aaaaaa", "aa");        // Output: 5
echo "\n";
echo pattern_count("hell", "hello");       // Output: 0
