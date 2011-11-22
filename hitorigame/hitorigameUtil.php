<?php

// 最小計算数を総当りで取得
function getMinimumCount($nums, $count = 1) 
{
    // 5の倍数があったらその数を削除
    if (checkMultiplesOf5($nums)) {
        $numsDeletedMultiplesOf5 = deleteMultiplesOf5($nums); 
        // 全ての数が削除されたら計算回数を返却
        if (checkEmptyArray($numsDeletedMultiplesOf5)) return $count;
    }    
    
    // 全ての数を2で割ったものを変数に代入
    $halfNums       = divideAllNumHalf($nums);
    
    // もとの数字を2で割ったもの、5の倍数を削除したものをそれぞれ再帰
    $countAfterHalf = getMinimumCount($halfNums, $count + 1);
    if (!empty($numsDeletedMultiplesOf5)) $deleteNumCount = getMinimumCount($numsDeletedMultiplesOf5, $count + 1);
    
    // 全ての計算回数から最も少ないものを返却
    if (!empty($deleteNumCount) && $countAfterHalf >= $deleteNumCount) return $deleteNumCount;
    return $countAfterHalf;
}

//対象の数字はファイル3行目から1行飛ばしずつのためそれらを配列に代入
function getNums()
{
    $fp = fopen('number.txt', 'r');
    
    // ファイルから全ての数字を配列に代入
    if ($fp) {
        while (!feof($fp)) {
            $nums[] = fgets($fp);
        }
    }
    
    // 3列目から1つ飛ばしで対象データのためそれを取得
    for ($i = 2; $i < count($nums); $i += 2){
        $modifiedNums[] = explode(' ', $nums[$i]);
    }
    return $modifiedNums; 
}

// 5の倍数が一つでもあるかチェック
function checkMultiplesOf5($nums)
{
    foreach ($nums as $num) {
        if ($num % 5 === 0) return true; 
    }
    return false;
}

// 5の倍数を削除するためのフィルター作成
function setFilterMultiplesOf5($num)
{
    if ($num % 5 !== 0) return true;
    return false;
}

// 5の倍数を削除
function deleteMultiplesOf5($nums)
{
    return array_filter($nums, "setFilterMultiplesOf5");
}

// 配列が空になっていないかチェック
function checkEmptyArray($array)
{
    if (empty($array)) return true;
    return false;
}

// 2で割るためのフィルター作成
function setFilterDivideHalf($num)
{
    if ($num % 2 !== 0) return ($num - 1) / 2;
    return $num / 2;
}

// 全ての数を2で割る
function divideAllNumHalf($nums)
{
    return array_map("setFilterDivideHalf", $nums);
}

/*
// 0を削除するためのフィルター作成
function setFilterDelete0 ($num) 
{
    if ($num === 0) return true;
}

// 配列の中から0を削除する処理 (かえって処理が増えるため実装せず)　
function delete0($nums)
{
    return array_filter($nums, "setFilterDelete0");
}
*/
