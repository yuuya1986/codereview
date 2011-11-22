<?php

/**
 * 本日の課題：caesar暗号
 * 参考：http://ja.wikipedia.org/wiki/%E3%82%B7%E3%83%BC%E3%82%B6%E3%83%BC%E6%9A%97%E5%8F%B7
 */
require_once 'cryptogram.php';

function analysisCaesarCryptogram($keywords, $cryptogram){

    //キーワードを二回繰り返したものを変数に代入。
    $doubleKeywords = $keywords.$keywords;
    $devidedKeywords = str_split($doubleKeywords);
    $countKeyword = strlen($keywords);

    //文字のずれを1文字ずつずらす。
    for($gapNum = 1; $gapNum < $countKeyword; $gapNum++){
       echo '<hr />' . $gapNum . '文字ずらした結果<br />';

        //先頭から1文字ずつ取得。
        for($i = 0; $i <= strlen($cryptogram); $i++){
            $cutWord = substr($cryptogram, $i, 1);
            $result = '';

            //ずらした文字を出力。
            for($j = 0; $j < $countKeyword; $j++){
                if($cutWord === $devidedKeywords[$j]){
                    $correspondWordNum = $j + $gapNum;
                    $result = $devidedKeywords[$correspondWordNum];
                    echo $result;
                    continue;
                }
            }
        }
    }
}

analysisCaesarCryptogram($keywords, $cryptogram);

/*
実行結果
One summer day Alice was sitting on the riverbank with her older sister. Alice's sister was reading a book and Alice noticed that the book didn't have any pictures, which made Alice lose interest in it. Then as she looked out into the meadow, she saw something very peculiar. the saw a large white rabbit running past her looking at his watch saying 'Oh dear Oh dear I shall be too late.' Then he popped down a rabbit hole. Alice, being the curious girl she was, followed the rabbit down that hole and found herself in a land with many wonders. It was a wonderland. the met some interesting creatures including the King and Queen of Hearts, the Hatter, and the March Hare. the found that many creatures in this land didn't have the best of tempers and didn't want to try to help Alice figure out where to go and what to do. Alice also found herself changing sizes after eating or drinking things she found. One minute she was a few inches tall and the next she was nine feet tall. When Alice was in this land she expected the unexpected and didn't think much of the unusual occurrences. the used her knowledge to help other people, such as when she made sense of evidence during a trial. As much as Alice thought it interesting being with these strange creatures and trying to get along with them, she wondered when she would return home to her normal life or if she would. the remembered her cat and dreamed of seeing him again. But was there a way to get out or was it all just a dream?
*/
