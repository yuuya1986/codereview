<?php

/**
 *
 * phpでstack・queueClassを作成
 * 
 * 【重視する点】
 * ・変更容易性
 * ・テスト容易性
 *
 * 【変更容易性とは】
 * ・疎結合であること
 * ・機能が細分化されていること
 * ・可読性が高いこと
 *
 * 【テスト容易性とは】
 * ・疎結合であること
 * ・機能が細分化されていること
 * ・可読性が高いこと
 * ・ネストが少ないこと
 * ・1つの関数内で処理が完結すること
 * ・例外処理が規定されている
 *
 * 【仕様】
 * ・stack-Push    = 引数で与えた英数字を配列の先頭に追加する(複数可)
 *                   指定した引数は入力とは逆順に追加する。 
 * ・stack-Pop     = 指定した数の値を配列の先頭から取得し、それを削除する(値と配列共に返却)
 *                   指定した数が配列内の値の数より大きい場合、最大数を返却する
 * ・queue-Enqueue = 引数で与えた英数字を配列の最後尾に追加する(複数可)
 * ・queue-Dequeue = 指定した数の値を配列の末尾から取得し、それを削除する(値と配列共に返却)
 *                   指定した数が配列内の値の数より大きい場合、最大数を返却する
 *
 * 【行なったこと】
 * ・それぞれのclassを作成し、静的メソッドで呼び出せるようにした
 * ・QueueEnqueueとQueueDequeueはそれぞれStackPushとStackPopのclassを継承
 *
 * @author 原口悠哉 Yuya_Haraguchi@voyagegroup.com
 * @date   2011-10-11
 *
 */

require_once ('stackPush.class.php');
require_once ('stackPop.class.php');
require_once ('queueEnqueue.class.php');
require_once ('queueDequeue.class.php');

$originalArray = array(1,2,3,4,5);

$arrayAfterPush      = StackPush::execStackPush($originalArray, 'MARU', 4312098, 123);
//var_dump($arrayAfterPush);

$arrayAfterPop     = StackPop::execStackPop($originalArray, 34);
var_dump($arrayAfterPop);

$arrayAfterEnqueue = QueueEnqueue::execQueueEnqueue($originalArray, 493287, 'hoge');
//var_dump($arrayAfterEnqueue);

$arrayAfterDequeue = QueueDequeue::execQueueDequeue($originalArray, 4);
//var_dump($arrayAfterDequeue);
