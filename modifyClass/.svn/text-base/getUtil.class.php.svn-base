<?php

require_once ('const.php');

abstract class GetUtil
{
    public function __construct(){}

    /**
     * 引数の数が正しいか検証 
     */
    protected function _isRightArgumentsNum($arguments)
    {
        if (count($arguments) !== LIMIT_AUGUMENT_NUM) throw new Exception ('引数の数が不正です');
    }

    /**
     * 第一引数が配列であるか検証
     */
    protected function _isArrayFirstArgument($arguments)
    {
        if (!is_Array($arguments)) throw new Exception ('第一引数には配列を指定してください');
    }

    /**
     * 第二引数がintであるか検証
     */
    protected function _isIntSecondArgument($arguments)
    {
        if (!is_int($arguments)) throw new Exception ('第二引数にはintを指定してください');
    }

    
    /**
     * 抽象メソッドを定義 
     */
    protected abstract function _getValues($arrayData, $num);
    protected abstract function _deleteElements($arrayData, $num);
}
