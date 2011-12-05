<?php

/**
 *
 * コードレビュー課題　ボーリングスコアシステム
 *
 * 【仕様】
 * クラスのインスタンス化に際してユーザーを5人まで引数として渡せる
 * それぞれのスコア、最終順位を表示する
 *
 * @autor 原口悠哉 yuya_haraguchi@voyagegroup.com
 * @date  2011/11/21
 *
 */

$postedUsers = $_POST['usersName'];

require_once 'PlayBowling.class.php';

$bowling = new PlayBowling($postedUsers);
$bowling->playBowling();
