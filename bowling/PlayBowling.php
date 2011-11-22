<?php

require_once 'const.php';
global $throwCount;

$allSum      = 0;
$throwCount  = 0;
$strikeFlame = array();
$spareFlame  = array();

for ($i = FIRST_FLAME; $i <=LAST_FLAME; $i++) {

    if ($i === LAST_FLAME) {
        $throwCount++;
        $flameScore[LAST_FLAME][1] = fullPinThrow();
        $eachThrowScore[$throwCount] = $flameScore[LAST_FLAME][1];
        // 10フレーム目は必ず2投目を投げるためここでカウントを+1
        $throwCount++;

        if ($flameScore[LAST_FLAME][1] === FULL_PIN_NUM) {
            $flameScore[LAST_FLAME][2] = fullPinThrow();

        } else {
            $flameScore[LAST_FLAME][2] = remainPinThrow($flameScore[LAST_FLAME][1]);
        }

        $eachThrowScore[$throwCount] = $flameScore[LAST_FLAME][2];

        // 最後の一投は前フレームまでのスコアに関係がないため投げたカウントを増やさない

        if (array_sum($flameScore[LAST_FLAME]) < FULL_PIN_NUM) {
            break;

        } elseif (array_sum($flameScore[LAST_FLAME]) === FULL_PIN_NUM) {
            // スペア、もしくはストライクで2投目がガーターだった場合
            $flameScore[LAST_FLAME][3] = fullPinThrow();
            break;

        } elseif (array_sum($flameScore[LAST_FLAME]) > FULL_PIN_NUM) {
            // ストライクを取り2投目で1本以上倒した場合
            $flameScore[LAST_FLAME][3] = remainPinThrow($flameScore[LAST_FLAME][2]);
            break;
        }
    }

    $throwCount++;
    $flameScore[$i][1]           = fullPinThrow();
    $eachThrowScore[$throwCount] = $flameScore[$i][1];

    if ($flameScore[$i][1] === FULL_PIN_NUM) {
        $strikeFlame[$i] = $throwCount;
        $flameScore[$i][2] = '-';
        continue;
    }

    $throwCount++;
    $flameScore[$i][2]           = remainPinThrow($flameScore[$i][1]);
    $eachThrowScore[$throwCount] = $flameScore[$i][2];

if (array_sum($flameScore[$i]) === FULL_PIN_NUM) {
        $spareFlame[$i] = $throwCount;
    }
}

for ($i = 1; $i <= 10; $i++) {
    $sumScore[$i] = array_sum($flameScore[$i]);
}

foreach ($strikeFlame as $flame => $throwCount) {
    $sumScore[$flame] += $eachThrowScore[$throwCount + 1] + $eachThrowScore[$throwCount + 2];
}

foreach ($spareFlame as $flame => $throwCount) {
    $sumScore[$flame] += $eachThrowScore[$throwCount + 1];
}


$allSum = 0;

for ($i = 1; $i <= 10; $i++) {

    echo $i . 'フレーム目' . "\n";
    echo '1投目：' . $flameScore[$i][1] . "\n";
    echo '2投目：' . $flameScore[$i][2] . "\n";
    if ($i === 10 && isset($flameScore[10][3])) echo '3投目：' . $flameScore[10][3] . "\n";
    // TODO デバック用にフレーム毎のスコアを出しているが、本来はゲームスコアを出す。
    echo 'フレームスコア:' . $sumScore[$i] . "\n";
    $allSum += $sumScore[$i];
}

echo '合計：' , $allSum . "\n";

echo $throwCount . "\n";

// ---関数一覧--- //


function fullPinThrow()
{
    $score = rand(0, FULL_PIN_NUM);
    if ($score === 0) $score = 'G';
    return $score;
}

function remainPinThrow($firstScore)
{
    $leftPin        = FULL_PIN_NUM - $firstScore;
    $score = rand(0, $leftPin);
    return $score;
}
