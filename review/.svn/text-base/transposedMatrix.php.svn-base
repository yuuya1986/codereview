<?php

/**
 * 本日の課題：転置行列
 *
 * 定義したn * m 行列に対して、
 * 転置行列(m * n)の形でコマンドラインに表示
 *
 * 引数が配列で無い場合エラーを返すものとし、
 * 各キーに入力された値の数が等しくない場合も例外を返す
 */

function transposedMatrix($rows){

    if (!is_array($rows)){
        throw new Exception('配列を入力してください');
    }
    
    $countArrays = count($rows) -1;

    //配列に入っている値の数が各キーで等しいか検証 
    for($i =1; $i <= $countArrays; $i++){
        if(count($rows[0]) !== count($rows[$i])){
            throw new Exception('配列に入っている数がばらばらです。');        
        }
    }

    //入力された配列の1層目と2層目のキー数が2*3,4*3のように、
    //等しくなかった時に大きな方を代入する
    if (count($rows) >= count($rows[0])){
        $countKeys = count($rows)-1;
    }else{
        $countKeys = count($rows[0])-1;
    }

    //転置行列処理を実行。
    for ($i = 0; $i < $countArrays; $i++){
        for ($j = $countKeys; $j > $i; $j--){
            
            //存在しないキーに対して空を代入
            if(!isset($rows[$i][$j])){
               $rows[$i][$j] = ''; 
            }
            if(!isset($rows[$j][$i])){
               $rows[$j][$i] = ''; 
            }
            
            $tmp          = $rows[$i][$j];
            $rows[$i][$j] = $rows[$j][$i];
            $rows[$j][$i] = $tmp;
            echo '*';
       }
    echo "\n";
    }
    return $rows;
}
