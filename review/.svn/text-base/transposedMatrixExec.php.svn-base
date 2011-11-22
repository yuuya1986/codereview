<?php

require_once 'transposedMatrix.php';

$rows = array(
            array(1,2,3,),
            array(4,5,6,),
            array(7,8,9,),
            array(10,11,12,)
             );   

//配列をそのまま表示
function before_transposed($rows){
    echo "before\n";
    foreach($rows as $value1){
        foreach($value1 as $value2){
            echo $value2 . ' ';
        }
        echo "\n";
    }
    echo "\n";
}

//転置行列後の配列と計算回数を表示
function after_transposed($rows){
    try {
        $result = transposedMatrix($rows);
        echo "after(上記の*は計算回数)\n";
        foreach($result as $value1){
            foreach($value1 as $value2){
                echo $value2 .' ';    
            } 
            echo "\n";
        }
    } catch (Exception $e){
        echo $e->getMessage();
    }
}

echo before_transposed($rows);
echo after_transposed($rows);
