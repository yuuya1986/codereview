<?php

$str = 'hamstar';

function reverse($str, $num_from_head = '', $num_from_last = '') {

	if(empty($num_from_head)){
		$num_from_head = 0;
		$num_from_last = mb_strlen($str) - 1;
	}
		
	$array = str_split($str);
	
	if($num_from_head < $num_from_last){
		$tmp = $array[$num_from_head];
		$array[$num_from_head] = $array[$num_from_last];
		$array[$num_from_last] = $tmp;
		
		$str = implode($array);
		return reverse($str, $num_from_head + 1, $num_from_last - 1);
		
	}else{
		return $str;
	}
}

var_dump(reverse($str));
