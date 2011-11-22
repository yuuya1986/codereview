<?php

/**
 * 
 * 対象の数字は3行目から1行飛ばしずつのため
 * それらを配列に代入
 *
 */
class getNums
}
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
}
