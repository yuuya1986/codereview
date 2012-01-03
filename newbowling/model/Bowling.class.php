<?php
/**
 * ボーリングのスコアをランダムで生成
 *
 * @author yuya_haraguchi(yuuya1986) yuuya.job@gmail.com
 * @date   2012/01/03
 *
 */

class Bowling
{
    const FIRST_FLAME  = 1;
    const LAST_FLAME   = 10;
    const FULL_PIN_NUM = 10;

    public  $score;
    private $_users;
    private $_strileFlame;
    private $_spareFlame;
    private $_ranking;

    /**
     * インスタンス化と同時にバリデーション
     */
    public function __construct($usersName)
    {
        if (!is_array($usersName)) throw new Exception ('不正な値が入力されています');

        // POSTされた値から空の値を除去
        foreach ($usersName as $userName) {
            if (!empty($userName)) $users[] = $userName;
        }

        if (empty($users)) throw new Exception ('名前が入力されていません');

        $this->_validatePostedData($users);

        $this->_users = $users;
    }

    /**
     * 最終的なメソッドの実行
     */
    public function showResult()
    {
        foreach ($this->_users as $user) {

            // 各投球のスコアをセット
            $this->_throwBowl($user);

            // スコアの修正
            $eachFlameScore = $this->_sumEachThrowScore($this->score[$user]);
            $this->_setModifyScore($user, $eachFlameScore, $this->_strikeFlame, $this->_spareFlame);

            // スコア・ランキングのセット
            $this->_setSumAllFlameScore($user);
            $this->_setSumHalfwayScore($user);
            $this->_setRanking();
        }
    }

    /**
     * バリデーションメソッド
     */
    private function _validatePostedData($array)
    {
        $userName = array();

        foreach ($array as $row) {
            if (preg_match('/\A[\n\t<>]\z/', $row)) throw new Exception ('改行・タブ・一部の記号は入力できません');
            if (mb_strlen($row) > 10)               throw new Exception ('不正な値が入力されています');

            if (in_array($row, $userName))          throw new Exception ('同じ名前は入力できません');
            $userName[] = $row;
        }
    }

    /**
     * ボールを投げる処理をまとめたもの
     */
    private function _throwBowl($user)
    {
        // スペア、ストライクのスコア修正を行うため投球数を記録
        $this->_throwCount  = 0;
        $this->_strikeFlame = array();
        $this->_spareFlame  = array();

        for($i = self::FIRST_FLAME; $i <= self::LAST_FLAME; $i++) {
            if ($i === self::LAST_FLAME) {
                $this->_throwLastFlame($user);
            } else {
                $this->_throwNormalFlame($user, $i);
            }
        }
    }

    /**
     * ピンが10本残っている状態でのスローイング
     */
    private function _fullPinThrow()
    {
        return rand(0, self::FULL_PIN_NUM);
    }

    /**
     * 1投目を投げ終えた後のスローイング
     */
    private function _remeinPinThrow($downedPinNum)
    {
        return rand(0, 10 - $downedPinNum);
    }

    /**
     * 1〜9フレーム目までの処理
     */
    private function _throwNormalFlame($user, $flameNum)
    {
        // スコアをフレーム、投球数毎に記録
        $this->_throwCount++;
        $this->score[$user][$flameNum][1]         = $this->_fullPinThrow();
        $this->_eachThrowScore[$this->_throwCount] = $this->score[$user][$flameNum][1];

        $this->score[$user][$flameNum][2]         = $this->_remeinPinThrow($this->score[$user][$flameNum][1]);

        // ストライクを取った場合の処理
        if ($this->score[$user][$flameNum][1] === self::FULL_PIN_NUM) {
            $this->_strikeFlame[$flameNum] = $this->_throwCount;
            return;

        // ストライクでなかった場合の処理
        } else {
            $this->_throwCount++;
            $this->_eachThrowScore[$this->_throwCount] = $this->score[$user][$flameNum][2];
        }

        // 2投の合計が10である場合スペアフラグを立てる
        if (array_sum($this->score[$user][$flameNum]) === 10) $this->_spareFlame[$flameNum] = $this->_throwCount;
    }

    /**
     * 10フレーム目の処理
     */
    private function _throwLastFlame($user)
    {
        // スコアをフレーム、投球数毎に記録
        $this->_throwCount++;
        $this->score[$user][self::LAST_FLAME][1]   = $this->_fullPinThrow();
        $this->_eachThrowScore[$this->_throwCount] = $this->score[$user][self::LAST_FLAME][1];

        // 10フレーム目は必ず2投目を投げるのでここでカウントアップ
        $this->_throwCount++;

        // 1投目がストライクだった場合の処理
        if ($this->score[$user][self::LAST_FLAME][1] === self::FULL_PIN_NUM) {
            $this->score[$user][self::LAST_FLAME][2] = rand(0, self::FULL_PIN_NUM);

        // ストライクでなかった場合の処理
        } else {
            $this->score[$user][self::LAST_FLAME][2] = rand(0, 10 - $this->score[$user][self::LAST_FLAME][1]);
        }

        // 投球数毎のスコアを記録
        $this->_eachThrowScore[$this->_throwCount]    = $this->score[$user][self::LAST_FLAME][2];

        // 3投目を投げるかつ、10本のピンが残っている場合の処理
        if (array_sum($this->score[$user][self::LAST_FLAME]) !== 0 && (array_sum($this->score[$user][self::LAST_FLAME]) % 10) === 0) {
            $this->score[$user][self::LAST_FLAME][3] = $this->_fullPinThrow();

        // 3投目を投げるかつ、10本未満のピンが残っている場合の処理
        } elseif (array_sum($this->score[$user][self::LAST_FLAME]) > 10) {
            $this->score[$user][self::LAST_FLAME][3] = rand(0, (20 - array_sum($this->score[$user][self::LAST_FLAME])));
        }
    }

    /**
     * 各フレームの合計スコアを集計
     */
    private function _sumEachThrowScore($eachThrowScore)
    {
        for ($i = self::FIRST_FLAME; $i <= self::LAST_FLAME; $i++) {
            $eachFlameScore[$i] = array_sum($eachThrowScore[$i]);
        }
        return $eachFlameScore;
    }


    /**
     * ストライクとスペアが出ていた場合のスコア修正
     */
    private function _setModifyScore($user, $eachFlameScore, $strikeFlame, $spareFlame)
    {
        // ストライク時のスコアを修正
        $eachFlameScore = $this->_modifyStrikeScore($eachFlameScore, $strikeFlame);

        // スペア時のスコア修正
        $eachFlameScore = $this->_modifySpareScore($eachFlameScore, $spareFlame);

        $this->score[$user]['eachFlameScore'] = $eachFlameScore;
    }

    /**
     * ストライク時のスコアを修正
     */
    private function _modifyStrikeScore($eachFlameScore, $strikeFlame)
    {
        foreach ($strikeFlame as $flame => $throwCount) {
            $eachFlameScore[$flame] += $this->_eachThrowScore[$throwCount + 1] + $this->_eachThrowScore[$throwCount + 2];
        }
        return $eachFlameScore;
    }

    /**
     * スペア時のスコアを修正
     */
    private function _modifySpareScore($eachFlameScore, $spareFlame)
    {
        foreach ($spareFlame as $flame => $throwCount) {
            $eachFlameScore[$flame] += $this->_eachThrowScore[$throwCount + 1];
        }
        return $eachFlameScore;
    }

    /**
     * 全フレームのスコアを修正
     */
    private function _setSumAllFlameScore($user)
    {
        $this->score[$user]['allFlameScore'] = array_sum($this->score[$user]['eachFlameScore']);
    }


    /**
     * スコアの途中経過を記録
     */
    private function _setSumHalfwayScore($user) {

        $this->score[$user]['halfwayScore'] = array();

        // スコアの途中経過をセット
        for ($i = self::FIRST_FLAME; $i <= self::LAST_FLAME; $i++){

            if (isset($this->score[$user]['halfwayScore'][$i - 1])) {
                $this->score[$user]['halfwayScore'][$i] = $this->score[$user]['eachFlameScore'][$i] + $this->score[$user]['halfwayScore'][$i -1];
            } else {
                $this->score[$user]['halfwayScore'][$i] = $this->score[$user]['eachFlameScore'][$i];
            }
        }
    }

    /**
     * スコアによる順位を設定
     */
    private function _setRanking()
    {
        foreach ($this->score as $user => $score)
        {
            $this->_ranking[$user] = $score['allFlameScore'];
        }
        arsort($this->_ranking);
    }
}
