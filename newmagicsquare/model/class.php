<?php
/**
 * 3×3魔方陣の検証用クラス
 *
 * @author yuya_haraguchi(yuuya1986) yuuya.job@gmail.com
 * @date   2011/12/30
 *
 */

class MagicSquare {

    const MAGIC_SQUARE_SIZE = 3;
    const ALL_VALUE_NUM     = 9;

    private $_over;
    private $_middle;
    private $_under;
    private $_allNums;
    private $_sideLongSum;
    private $_verticalSum;
    private $_diagonalSum;

    // 横列ごとの各値と全ての値をまとめたものを初期化
    public function __construct($over, $middle, $under)
    {
        $this->_over    = $over;
        $this->_middle  = $middle;
        $this->_under   = $under;
        $this->_allNums = array_merge($over, $middle, $under);
    }

    //
    public function checkMagicSquare()
    {
        $this->_checkDataNum();
        $this->_checkDataLack();
        $this->_checkDataInt();
        $this->_checkSideLongSum();
        $this->_checkVerticalSum();
        $this->_checkDiagonalSum();
        $this->_checkAllSum();
    }

    /**
     * 配列の値の数が3つか検証
     */
    private function _checkDataNum()
    {
        if (!count($this->_over)   === self::MAGIC_SQUARE_SIZE) throw new Exception ('上列の値の数が不正です');
        if (!count($this->_middle) === self::MAGIC_SQUARE_SIZE) throw new Exception ('中列の値の数が不正です');
        if (!count($this->_under)  === self::MAGIC_SQUARE_SIZE) throw new Exception ('下列の値の数が不正です');
    }

    /**
     * 値に空がないか検証
     */
    private function _checkDataLack()
    {
        foreach ($this->_allNums as $value) {
            if (empty($value) && $value !== '0') throw new Exception ('全ての値を入力してください');
        }
    }

    /**
     * 値が数値かどうか検証
     */
    private function _checkDataInt()
    {
        foreach ($this->_allNums as $value) {
            if (!preg_match('/\A[0-9]{1,4}\z/', $value)) throw new Exception ('値は半角数字で入力してください');
        }
    }

    /**
     * 値に重複がないか検証
     */
    private function _checkDataVariability()
    {
        if (count(array_unique($this->_allNums)) !== self::ALL_VALUE_NUM) throw new Exception ('値が重複しています');
    }

    /**
     * 横列の合計値が3列とも等しいか検証して合計値を返却
     */
    private function _checkSideLongSum()
    {
        // 各横列の合計を代入
        $overSum   = array_sum($this->_over);
        $middleSum = array_sum($this->_middle);
        $underSum  = array_sum($this->_under);

        if ($overSum !== $middleSum && $overSum !== $underSum) throw new Exception ('魔方陣が成立していません');
        return $overSum;
    }

    /**
     * 横列の合計値/列を代入
     */
    private function _setSideLongSum()
    {
        $this->_sideLongSum = $this->_checkSideLongSum;
    }

    /**
     * 縦列の合計値が3列とも等しいか検証して合計値を返却
     */
    private function _checkVerticalSum()
    {
        // 各縦列の値を代入
        $i = 0;
        while(!empty($this->_over[$i])) {
            $verticalSum[$i][] = $this->_over[$i];
            $verticalSum[$i][] = $this->_middle[$i];
            $verticalSum[$i][] = $this->_under[$i];
            $i++;
        }

        // 各縦列の値の合計を代入
        $leftSum   = array_sum($verticalSum[0]);
        $middleSum = array_sum($verticalSum[1]);
        $rightSum  = array_sum($verticalSum[2]);

        if ($leftSum !== $middleSum && $leftSum !== $middleSum) throw new Exception ('魔方陣が成立していません');
        return $leftSum;
    }

    /**
     * 縦列の合計値/列を代入
     */
    private function _setVerticalSum()
    {
        $this->_verticalSum = $this->_checkVerticalSum();
    }

    /**
     * 斜列の合計値が2列とも等しいか検証して合計値を返却
     */
    private function _checkDiagonalSum()
    {
        // 各斜列の値を合計
        $upwardSum   = $this->_over[2] + $this->_middle[1] + $this->_under[0];
        $downWardSum = $this->_over[2] + $this->_middle[1] + $this->_under[0];

        if ($upwardSum !== $downWardSum) throw new Exception ('魔方陣が成立していません');
        return $upwardSum;
    }

    /**
     * 斜列の合計値/列を代入
     */
    private function _setDiagonalSum()
    {
        $this->_diagonalSum = $this->_checkDiagonalSum();
    }

    /**
     * 全列の合計値が等しいか検証
     */
    private function _checkAllSum()
    {
        if ($this->_sideLongSum !== $this->_verticalSum && $this->_sideLongSum !== $this->_diagonalSum) {
            throw new Exception ('魔方陣が成立していません');
        }
    }
}
