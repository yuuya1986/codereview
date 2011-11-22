<?php
require_once 'const.php';
require_once './PlayBowlingUtil.php';

?>
<p>
<table border="2">
<tr>

<?php

echo h($userName) . 'さんのスコアはこちら';

for ($i = 1; $i <= 10; $i++) {
    if ($i === LAST_FLAME && isset($flameScore[LAST_FLAME][3])) {
        echo '<th colspan="3">' . $i . '</th>';
        break;
    }
    echo '<th colspan="2">' . $i . '</th>';
}
echo '<th>合計</th>';

?>

</tr>
<tr>

<?php

$allSum = 0;
for ($i = 1; $i <= 10; $i++) {
    echo '<td>' . h($flameScore[$i][1]) . '</td>';
    echo '<td>' . h($flameScore[$i][2]) . '</td>';
    if ($i === LAST_FLAME && isset($flameScore[LAST_FLAME][3])) echo '<td>' . h($flameScore[$i][3]) . '</td>';

    $allSum += $sumFlameScore[$i];
}
echo '<td colspan="2" rowspan="2">' . h($allSum) . '</td>';

?>

</tr>
<tr align="center">
<?php

$sumHalfwayScore = 0;
for ($i = 1; $i <= 10; $i++) {
    $sumHalfwayScore += $sumFlameScore[$i];
    if ($i === LAST_FLAME && isset($flameScore[LAST_FLAME][3])) {
        echo '<td colspan="3">' . h($sumHalfwayScore) . '</td>';
        break;
    }
    echo '<td colspan="2">' . h($sumHalfwayScore) . '</td>';
}

$ranking[$userName] = $allSum;
?>
</tr>
</table>
</p>
