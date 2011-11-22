<?php

require_once 'cryptogram.php';

$keywords = str_split($str);
$countKeywords = count($keywords);
var_dump($keywords);
foreach ($keywords as $keyword) {
    $appearanceCounts[] = substr_count($cryptogram, $keyword);
}

$maxAppearanceWord =  $keywords[array_search(max($appearanceCounts), $appearanceCounts)];

for($i = 0; $i < count($keywords) -1; $i++){
    
    $j = $i + 20;
    if($j >= $countKeywords){
        $j = $j - $countKeywords;
    }
   echo $keywords[$i];
   echo "：{$keywords[$j]}<br />";
   $cryptogram =  str_replace($keywords[$i], $keywords[$j], $cryptogram);
   echo $cryptogram . '<hr />';
}

for($i = 'a'; $i < 'z'; $i++){

    echo $i;
}
