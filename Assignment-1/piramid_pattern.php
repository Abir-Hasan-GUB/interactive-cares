<?php

$sampleNumber = 5;

for ($i = 0; $i < $sampleNumber; $i++) {
    for ($j = $i; $j < $sampleNumber; $j++) {
        echo " ";
    }
    for ($j = 1; $j <= (2 * $i - 1); $j++) {
        printf("*");
    }
    printf("\n");
}
