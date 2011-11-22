<?php

//文字列の順序を逆にして表示する。
//文字列を配列に収納し、その後順に出力。

//作成したもの1つめ

$str	= 'abcde';
$str2	= '12345';

function reverse($str){

	$count = mb_strlen($str);
	
	for($i = -1; $i >= -$count; $i--){
		$result[] = mb_substr($str, $i, 1);
	}
	
	for($j = 0; $j < $count; $j++){
	echo $result[$j];
	}
}

echo reverse($str);


echo '<br />';


//作成したもの2つめ
	
function reverse2($str2){
	
	$count = mb_strlen($str2);

	for($i = 1; $i <= $count; $i++){
		$result[$i] = mb_substr($str2, -$i, 1);
		echo $result[$i];
	}
}	

echo reverse2($str2);

echo '<br />';


//コードレビューを受けて修正したもの1つめ

function reverse3($str2){

	$count = mb_strlen($str2);

	for($i = 1; $i <= $count; $i++){
		$result[$i] = mb_substr($str2, -$i, 1);
	}
	
	$abc = implode($result);
	return $abc;
}

echo reverse3($str2);

echo '<br />';


//修正したもの2つめ

function reverse4($str2){

	$count = mb_strlen($str2);
	$result = '';

	for($i = 1; $i <= $count; $i++){
		$result .= mb_substr($str2, -$i, 1);
	}
	
	return $result;
}

echo reverse4($str2);
