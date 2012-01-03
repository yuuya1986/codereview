<?php
$currentDir = dirname(__FILE__);
require_once $currentDir . '/../model/util.php';

// phpのバージョンが古くクラス内定数を参照できないため、ここで定義
define('FIRST_FLAME',  1);
define('LAST_FLAME',   10);
define('FIRST_THROW',  1);
define('SECOND_THROW', 2);
define('THIRD_THROW',  3);
?>


<?php
foreach ($bowling->score as $user => $score) {
?>

<p>
<?php echo h($user); ?>さんのスコアはこちら
<table border="2">

<tr>
<?php
for ($i = FIRST_FLAME; $i <= LAST_FLAME; $i++) {
    if ($i === LAST_FLAME && isset($score[LAST_FLAME][3])) {
        echo '<th colspan="3">' . $i . '</th>';
        break;
    }
    echo '<th colspan="2">' . $i . '</th>';
}
?>
<th>合計</th>
</tr>

<tr>
<?php
for ($i = FIRST_FLAME; $i <= LAST_FLAME; $i++) {
    echo '<td>' . h($score[$i][FIRST_THROW])  , '</td>';
    echo '<td>' . h($score[$i][SECOND_THROW]) , '</td>';
    if ($i === LAST_FLAME && isset($score[LAST_FLAME][THIRD_THROW])) echo '<td>' . h($score[$i][THIRD_THROW]) . '</td>';
}
?>
<td align="center" colspan="2" rowspan="2"><?php echo $score['allFlameScore']; ?></td>
</tr>

<tr align="center">
<?php
for ($i = FIRST_FLAME; $i <= LAST_FLAME; $i++) {
    if ($i === LAST_FLAME && isset($score[LAST_FLAME][3])) {
        echo '<td colspan="3">' . h($score['halfwayScore'][LAST_FLAME]) . '</td>';
        break;
    }
    echo '<td colspan="2">' . h($score['halfwayScore'][$i])  , '</td>';
}
?>
</tr>
</table>
<?php
}
?>
</p>

<?php
// 順位表示用に初期化
$i = 1;

foreach ($bowling->score as $user => $score) {
    echo $i . '位：' . $user . 'さん<br />';
    $i++;
}
?>

<p>
<a href="http://y-haraguchi.s-tanno.com/codereview/newbowling/controller/">もう一度対戦する</a>
</p>
