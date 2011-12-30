<?php
/**
 * 3×3の魔方陣数値チェック
 *
 * 仕様
 * ・入力できる値は半角数字のみ
 *
 * @author yuya_haraguchi(yuuya1986) yuuya.job@gmail.com
 * @date   2011/12/30
 *
 */

// 現在のディレクトリを代入
$currentDir = dirname(__FILE__);

// クラスの呼び出し
require_once $currentDir . '/../model/class.php';

// POSTの値がない場合トップページにリダイレクト
if(empty($_POST['overRecord']) || empty($_POST['middleRecord']) || empty($_POST['underRecord'])) {
    header("Location:http://y-haraguchi.s-tanno.com/codereview/magicSquare/controller/");
}

// POSTで受け取った値を変数に代入
$over   = $_POST['overRecord'];
$middle = $_POST['middleRecord'];
$under  = $_POST['underRecord'];

// インスタンス化
$magic = new MagicSquare($over, $middle, $under);

// 魔方陣チェックを実行
try {
$magic->checkMagicSquare();
require_once $currentDir . '/../view/correctAnswerTemplate.php';

} catch (Exception $e) {
    $errorMessages[] = $e->getMessage();
    require_once $currentDir . '/../view/formTemplate.php';
}
