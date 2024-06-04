<?php

$filePath = "./paragraph.txt";
$lines    = [];
$file     = fopen($filePath, "r");

if ($file) {
    while (!feof($file)) {
        $lines[] = fgets($file);
    }
} else {
    echo "Unable to open the file, check file name or permission...";
}
$totalWords = 0;

for ($i = 0; $i < count($lines); $i++) {
    $singleLine         = trim($lines[$i]);
    if($singleLine === ''){
        continue;
    }
   else{
    $tempParagraphCount = count(explode(" ", $singleLine));
    $totalWords         = $totalWords + $tempParagraphCount;
   }
}
echo "Total words: $totalWords\n";
