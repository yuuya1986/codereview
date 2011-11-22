<?php
/*
「n/2」を実現するために考えたのは「先頭と最後」「先頭+1と最後-1」・・・という形での交換の反復。
*/


	function reverse($str){
		
		$array = str_split($str);		//文字列を1文字ずつ配列に代入
		$result = array_reverse($array);	//配列の順番を逆転させる
		return implode('', $result);		//implode関数を用いて変数に代入
	}

$str = '12345';
echo reverse($str);
