<?php

//数字をinteger、stringとも昇順でソートする。

function num_sort($num){
	
    if(!preg_match('/^[0-9]+$/', $num)){
        throw new Exception ('数字を入力してください');	
    }

    $count        = strlen($num);
    $str          = strval($num);
    $splited_str  = str_split($str);

	for($i = 0; $i < $count; $i++){
		for($j = $i + 1; $j < $count; $j++){

		echo "{$i}と{$j}を交換\n";
			
            if($splited_str[$i] > $splited_str[$j]){
                $tmp             = $splited_str[$i];
                $splited_str[$i] = $splited_str[$j];
                $splited_str[$j] = $tmp;
			
                if($splited_str[$i] === '0'){
                    break;	
                }
            }			
        }
    }
    $result = implode('', $splited_str);
    return $result;
}


try{
    if(!isset($argv[1])){
        throw new Exception ('値が入力されていません');	
    }
    var_dump(num_sort($argv[1]));

}catch(Exception $e){
    echo $e->getMessage();
}

