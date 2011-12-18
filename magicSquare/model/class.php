<?php

/**
 * 3×3魔方陣の検証用クラス
 *
 * @author yuya_haraguchi(yuuya1986) yuuya.job@gmail.com
 * @date   2011/12/18
 *
 */

class MagicSquare {

    const magicSqureSize = 3;
    const allValueNum    = 9;

    /**
     * 配列の値の数が3つか検証
     */
    public function checkDataNum($array)
    {
        if (count($array) !== self::magicSqureSize) return false;
        return true;
    }

    /**
     * 値に空がないか検証
     */
    public function checkDataLack($array)
    {
        foreach ($array as $value) {
            if (empty($value) && $value !== '0') return false;
        }
        return true;
    }

    /**
     * 値が整数かどうか検証
     */
    public function checkDataInt($array)
    {
        foreach ($array as $value) {
            if (!preg_match('/\A[0-9]{1,4}\z/', $value)) return false;
        }
        return true;
    }

    /**
     * 値に重複がないか検証
     */
    public function checkDataVariability($over, $middle, $under)
    {
        $allNum = array();

        foreach ($over as $value) {
            $allNum[] = $value;
        }

        foreach ($middle as $value) {
            $allNum[] = $value;
        }

        foreach ($under as $value) {
            $allNum[] = $value;
        }

        // 重複している値をまとめる
        $allNum = array_unique($allNum);

        // 全ての値が重複していなかった場合true
        if (count($allNum) !== self::allValueNum) return false;
        return true;
    }

    /**
     * 横列の合計値が3列とも等しいか検証
     */
    public function checkSidelongSum($over, $middle, $under)
    {
        $overSum   = array_sum($over);
        $middleSum = array_sum($middle);
        $underSum  = array_sum($under);

        if ($overSum !== $middleSum) return false;
        if ($overSum !== $underSum)  return false;
        return $overSum;
    }

    /**
     * 縦列の合計値が3列とも等しいか検証
     */
    public function checkVerticalSum($over, $middle, $under)
    {
        $i = 0;
        while(!empty($over[$i])) {
            $verticalSum[$i][] = $over[$i];
            $verticalSum[$i][] = $middle[$i];
            $verticalSum[$i][] = $under[$i];
            $i++;
        }

        $leftSum   = array_sum($verticalSum[0]);
        $middleSum = array_sum($verticalSum[1]);
        $rightSum  = array_sum($verticalSum[2]);

        if ($leftSum !== $middleSum) return false;
        if ($leftSum !== $rightSum)  return false;
        return $leftSum;
    }

    /**
     * 斜列の合計値が2列とも等しいか検証
     */
    public function checkDiagonalSum($over, $middle, $under)
    {
        $upwardSum   = $over[2] + $middle[1] + $under[0];
        $downwardSum = $over[0] + $middle[1] + $under[2];

        if ($upwardSum !== $downwardSum) return false;
        return $upwardSum;
    }

    /**
     * 全列の合計値が等しいか検証
     */
    public function checkAllSum($sidelong, $vertical, $diagonal)
    {
        if ($sidelong !== $vertical) return false;
        if ($sidelong !== $diagonal) return false;
        return true;
    }
}
