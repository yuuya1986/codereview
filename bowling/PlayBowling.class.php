<?php

require_once 'const.php';

class PlayBowling
{
    private $_usersName;
    private $_strikeFlame;
    private $_spareFlame;
    private $_allSum;

    public function __construct()
    {
        // ループ変数設定
        $i = 0;

        // 未入力項目の削除
        foreach ($_POST['usersName'] as $row) {
            if (empty($row)) unset($_POST['usersName'][$i]);
            $i++;
        }
        $i = '';

        // ユーザーが一人も入力されていないばあいエラーページに飛ばす
        if (empty($_POST['usersName'])) {
            $errorMessages[] = 'ユーザーを一人は入力してください';
            require_once 'Error.php';
            exit;
        }

        $this->_usersName = $_POST['usersName'];


    }

    public function playBowling()
    {
        require_once 'header.tpl';

        foreach ($this->_usersName as $userName) {

            if (empty($userName) && $userName !== 0) continue;

            // 各ユーザー毎のスコアを出すために初期化
            $this->_strikeFlame = array();
            $this->_spareFlame  = array();
            $this->_flameScore  = array();
            $this->_throwCount  = 0;
            $this->_allSum      = 0;

            // 10フレーム目とそれ以外で別メソッドを起動
            for ($i = FIRST_FLAME; $i <= LAST_FLAME; $i++) {
                if ($i === LAST_FLAME) {
                    $this->_playLastFlame($i);
                    break;
                }
                $this->_playNormalFlame($i);
            }

            // ストライク、スペアが出たフレームのスコアを修正し、表示用に変数に代入
            $sumFlameScore = $this->_modifySumScore($this->_flameScore, $this->_strikeFlame, $this->_spareFlame);
            $flameScore    = $this->_flameScore;

            // viewの呼び出し
            require './PlayBowlingView.php';
        }
       // 順位表示ロジックの呼び出し
        require_once 'Ranking.php';
        require_once 'footer.tpl';
    }

    /*
     *  1~9フレーム目までのスコア生成
     */
    private function _playNormalFlame($i)
    {
        $this->_throwCount++;

        // 1投目を投げ、投球ごとのスコアも記録
        $this->_flameScore[$i][1]                  = $this->_fullPinThrow();
        $this->_eachThrowScore[$this->_throwCount] = $this->_flameScore[$i][1];

        // ストライクを取った場合の処理
        if ($this->_flameScore[$i][1] === FULL_PIN_NUM) {
            $this->_strikeFlame[$i]   = $this->_throwCount;
            $this->_flameScore[$i][2] = '-';
            return;
        } else {
            $this->_throwCount++;
            $this->_flameScore[$i][2]            = $this->_remainPinThrow($this->_flameScore[$i][1]);
            $this->_eachThrowScore[$this->_throwCount] = $this->_flameScore[$i][2];
        }

        // スペアを取った場合の処理
        if (array_sum($this->_flameScore[$i]) === FULL_PIN_NUM) {
            $this->_spareFlame[$i] = $this->_throwCount;
        }
    }

    /*
     *  10フレーム目までのスコア生成
     */
    private function _playLastFlame($i)
    {
        $this->_flameScore[LAST_FLAME][3] = '-';

        // 1投目を投げ、投球後とのスコアも記録
        $this->_throwCount++;
        $this->_flameScore[LAST_FLAME][1] = $this->_fullPinThrow();
        $this->_eachThrowScore[$this->_throwCount] = $this->_flameScore[LAST_FLAME][1];

        // 10フレーム目は必ず2投目を投げるためここでカウントを+1
        $this->_throwCount++;

        // ストライクを取った場合の処理
        if ($this->_flameScore[LAST_FLAME][1] === FULL_PIN_NUM) {
            $this->_flameScore[LAST_FLAME][2] = $this->_fullPinThrow();
            $this->_eachThrowScore[$this->_throwCount] = $this->_flameScore[LAST_FLAME][2];

        } else {
            $this->_flameScore[LAST_FLAME][2] = $this->_remainPinThrow($this->_flameScore[LAST_FLAME][1]);
            $this->_eachThrowScore[$this->_throwCount] = $this->_flameScore[LAST_FLAME][2];
        }

        $this->_eachThrowScore[$this->_throwCount] = $this->_flameScore[LAST_FLAME][2];

        // ストライク、もしくはスペアを取った際の処理
        // 最後の一投は前フレームまでのスコアに関係がないため投げたカウントを増やさない
        if (array_sum($this->_flameScore[LAST_FLAME]) === FULL_PIN_NUM) {
            // スペア、もしくはストライクで2投目がガーターだった場合
            $this->_flameScore[LAST_FLAME][3] = $this->_fullPinThrow();

        } elseif (array_sum($this->_flameScore[LAST_FLAME]) > FULL_PIN_NUM) {
            // ストライクを取り2投目で1本以上倒した場合
            $this->_flameScore[LAST_FLAME][3] = $this->_remainPinThrow($this->_flameScore[LAST_FLAME][2]);
        }
    }

    /*
     *  各フレームのスコアをまとめ、ストライク・スペアがあった場合スコアを修正する
     */
    private function _modifySumScore($flameScore, $strikeFlame, $spareFlame)
    {
        for ($i = 1; $i <= 10; $i++) {
            $sumFlameScore[$i] = array_sum($flameScore[$i]);
        }

        foreach ($strikeFlame as $flame => $throwCount) {
            $sumFlameScore[$flame] += $this->_eachThrowScore[$throwCount + 1] + $this->_eachThrowScore[$throwCount + 2];
        }

        foreach ($spareFlame as $flame => $throwCount) {
            $sumFlameScore[$flame] += $this->_eachThrowScore[$throwCount + 1];
        }
        return $sumFlameScore;
    }

    /*
     *  インスタンス化の際に与えられた引数のvalidate
     */
    private function _validateUserName($array)
    {
        foreach ($array as $value) {
            if (!preg_match('/[\w ]/', $value)) return false;
        }
        return true;
    }

    /*
     *  ピンが10本ある状況での投球
     */
    private function _fullPinThrow()
    {
        $_score = rand(0, FULL_PIN_NUM);
        if ($_score === 0)  $_score = 'G';
        return $_score;
    }

    /*
     *  ピンが10本ない状況での投球
     */
    private function _remainPinThrow($_firstScore)
    {
        $_leftPin        = FULL_PIN_NUM - $_firstScore;
        $_score = rand(0, $_leftPin);
        return $_score;
    }
}
