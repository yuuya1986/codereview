<?php

$fp = fopen('number.php', 'r');
if ($fp) {
    while (!feof($fp)){
    $hoge[] = fgets($fp);
    }
}
for ($i = 2; $i < count($hoge); $i += 2){
    $huga[] = explode(' ', $hoge[$i]);
}

foreach ($huga as $value) {
    $max = 0;
    
    foreach ($value as $piyo) {
       $count = 0;
           
           for (; ; ) {
            if (($piyo % 5) !== 0) {
                $count++;
                if ($piyo % 2 !== 0) {
                    $piyo = intval($piyo / 2 - 0.5);
                } else {
                    $piyo = $piyo / 2;
                }
            } else {
                $count++;
                if ($max < $count) {
                    $max = $count;
                }
                break;
            }
        }
    }
    echo $max . "\n";
}
