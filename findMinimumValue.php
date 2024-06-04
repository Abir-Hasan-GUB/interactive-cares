<?php

$testList = [10, -12, 34, 12, -3, 123];

function findMinValue($numberList)
{

 $listLength = count($numberList);

 $min = $numberList[0];

 for ($i = 1; $i < $listLength; $i++) {

  if (abs($min) > abs($numberList[$i])) {

   $min = abs($numberList[$i]);

  }
 }
 return $min;
}

echo findMinValue($numberList);
