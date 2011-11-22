<?php

/**
 *
 * 以下2つの操作が可能で、最小手数を出力する
 * - 全ての数を半分にする（端数は切り捨て）
 * - 5 の倍数 (0 を含む) を全て取り除く
 *
 * その他考えたこと
 * - 5の倍数を削除する操作が連続することはない
 * - 総当たりで計算を行う
 * - 0は計算に影響しない
 * - 10の倍数は2で割った次のターンでも5で割れる
 *
 * やりたいこと
 * - 5で割れる数が一つでもあれば5で割った場合と2で割った場合両方の値を保持
 * - 計算終了後、最小手数で計算できた場合の値を出力
 *
 * @author 原口悠哉 Yuya_Haraguchi@voyagegroup.com
 *
 */

require_once 'hitorigameUtil.php';

$nums = getNums();
foreach ($nums as $value) {
    echo getMinimumCount($value) . "\n";
}
