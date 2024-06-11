<?php

$number = 12345;

$numberArray = str_split((string)$number); // split every degit to an array to make it itterable

$sum = 0;

for ($i = 0; $i < count($numberArray); $i++) {
 $sum = $sum + $numberArray[$i]; // make summation of every degit.
}

echo "Sum of the '{$number}' Digits = " . $sum;
