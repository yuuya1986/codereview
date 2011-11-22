<?php
/**
 * GoogleDeveloperDay2011 アルゴリズムクイズ
 * 総当たりバージョン
 */

// 入力データの書かれたファイル
define('INPUT_FILE', './number.txt');

$fp = @fopen(INPUT_FILE, 'r');

if ($fp === false) die('ファイルのオープンに失敗');

// 1行目の取得(テストケース数:不使用)
$testCaseNum = fgets($fp);

// 数値の数が書かれた行かどうか
$numCountLineFlg = true;

while ($line = fgets($fp)) {
    // 数値の数が書いてある行はスキップ
    if ($numCountLineFlg === true) {
        $numCountLineFlg = false;
        continue;
    } else {
        $numCountLineFlg = true;
    }

    $inputNumbers = explode(' ', trim($line));

    // 最小手数を取得し表示
    echo getMinimumCount($inputNumbers, 1) . "\n";
}

fclose($fp);

exit;


/**
 * 与えられた数値配列の最小手数を取得する再帰関数
 */
function getMinimumCount($numbers, $count)
{
    // 5で割り切れる数がある場合
    if (hasDividableNum($numbers)) {
        // 5で割り切れる数を削除して次の数値配列を取得
        $nextDivNumbers = deleteDividableNum($numbers);

        // 数値が全てなくなった場合、手数を返却
        if (count($nextDivNumbers) === 0) return $count;
    }

    // 各数値を半分にした数値配列の最小手数を取得
    $nextHalfNumbers = getHalfNum($numbers);
    $halfNumCount    = getMinimumCount($nextHalfNumbers, $count + 1);

    if (empty($nextDivNumbers)) return $halfNumCount;

    // 5で割り切れる数を削除した数値配列の最小手数を取得
    $divNumCount = getMinimumCount($nextDivNumbers, $count + 1);

    if ($halfNumCount > $divNumCount) return $divNumCount;

    return $halfNumCount;
}

/**
 * 5で割り切れる数があるかどうか
 */
function hasDividableNum($numbers)
{
    foreach ($numbers as $num) {
        if (($num % 5) === 0) return true;
    }
    return false;
}

/**
 * 数値配列の各数値を半分にする(小数点切り捨て)
 */
function getHalfNum($numbers)
{
    $retNumbers = array();
    foreach ($numbers as $num) {
        $retNumbers[] = floor($num / 2);
    }
    return $retNumbers;
}


/**
 * 5で割り切れる数を削除する
 */
function deleteDividableNum($numbers)
{
    $retNumbers = array();
    foreach ($numbers as $num) {
        if (($num % 5) === 0) continue;
        $retNumbers[] = $num;
    }
    return $retNumbers;
}

