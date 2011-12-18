<?php

/**
 * 3×3の魔方陣数値チェック
 *
 * 仕様
 * ・入力できる値は半角数字のみ
 *
 * @author yuya_haraguchi(yuuya1986) yuuya.job@gmail.com
 * @date   2011/12/18
 *
 */

// 現在のディレクトリを代入
$currentDir = dirname(__FILE__);

// クラスの呼び出し
require_once $currentDir . '/../model/class.php';

// インスタンス化
$magic = new MagicSquare();

// POSTで受け取った値を変数に代入
$over   = $_POST['overRecord'];
$middle = $_POST['middleRecord'];
$under  = $_POST['underRecord'];

// 配列の値の数が3つか検証
$overResult   = $magic->checkDataNum($over);
$middleResult = $magic->checkDataNum($middle);
$underResult  = $magic->checkDataNum($under);

if (!$overResult || !$middleResult || !$underResult) {
    $errorMessages[] = '入力された値の数が不正です';
    require_once $currentDir . '/../view/formTemplate.php';
    exit;
}

// 値に空がないか検証
$overResult   = $magic->checkDataLack($over);
$middleResult = $magic->checkDataLack($middle);
$underResult  = $magic->checkDataLack($under);

if (!$overResult || !$middleResult || !$underResult) {
    $errorMessages[] = '全ての欄に入力してください';
    require_once $currentDir . '/../view/formTemplate.php';
    exit;
}

// 値が数値かどうか検証
$overResult   = $magic->checkDataInt($over);
$middleResult = $magic->checkDataInt($middle);
$underResult  = $magic->checkDataInt($under);

if (!$overResult || !$middleResult || !$underResult) {
    $errorMessages[] = '半角数字以外は入力不可です';
    require_once $currentDir . '/../view/formTemplate.php';
    exit;
}

// 値に重複がないか検証
$VarriabilityResult = $magic->checkDataVariability($over, $middle, $under);

if (!$VarriabilityResult) {
    $errorMessages[] = '入力した値が重複しています';
    require_once $currentDir . '/../view/formTemplate.php';
    exit;
}

// 横列の合計値が3列とも等しいか検証
$sidelongSum = $magic->checkSidelongSum($over, $middle, $under);

// 縦列の合計値が3列とも等しいか検証
$verticalSum = $magic->checkVerticalSum($over, $middle, $under);

// 斜列の合計値が2列とも等しいか検証
$diagonalSum = $magic->checkDiagonalSum($over, $middle, $under);

// 全列の合計値が等しいか検証
$checkAllSum = $magic->checkAllSum($sidelongSum, $verticalSum, $diagonalSum);

if ($sidelongSum === false || $verticalSum === false || $diagonalSum === false || $checkAllSum === false) {
    $errorMessages[] = '不正解!!ヒャッハー!!';
    require_once $currentDir . '/../view/formTemplate.php';
    exit;
}

// 間違いがなかった場合正解ページを呼び出し
require_once $currentDir . '/../view/correctAnswerTemplate.php';
