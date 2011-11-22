<?php

require_once ('const.php');

abstract class SetUtil
{

    public function __construct(){}

    /**
     * 与えられた引数の数が適当か検証
     */
    protected function _isEnoughArgumentsNum($arguments){
        if ($arguments < ENOUGH_AUGUMENT_NUM) throw new Exception ('引数の数が不足しています');
    }

    /**
     * 与えられた最後の引数が配列か検証
     */
    protected function _isArrayArgument($arguments)
    {
        if (!is_array($arguments[0])) throw new Exception ('第一引数に配列が与えられていません');
    }

    /**
     * 配列に追加する値を取得
     */
    protected function _getAddElements($arguments)
    {
        for ($i = 1; $i < count($arguments); $i++) {
            $addElements[] = $arguments[$i];
        }
        return $addElements;
    }

    /**
     * 配列に追加する値をバリデーション
     */
    protected function _validateAddElements($addElements)
    {
        foreach ($addElements as $addElement) {
            if (!preg_match('/^[0-9a-zA-Z]+$/', $addElement)) throw new Exception ('不正な値が入力されています');
        }
    }

    protected abstract function _margeAuguments($addElements, $addedArray);
}
