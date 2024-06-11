<?php

$testString  = "I love programming";
$stringArray = explode(" ", $testString); // make separated array from sentence

$length = count($stringArray);

$reverseString = [];

for ($i = 0; $i < $length; $i++) {
    $tempStr      = $stringArray[$i];
    $afterReverse = strrev($tempStr); // reverse every single array chunk of sentence
    array_push($reverseString, $afterReverse); // store it to another array
}

$finalReverseString = join(" ", $reverseString); // after getting reverse string arrays it combined to a single sentence.

echo "\n" . $testString . " => " . $finalReverseString . "\n";
