<?php

require_once ('const.php');

class StackPop
{
    
    /**
     * stack・popを実行
     */
    public static function execStackPop()
    {
        try {
            // 正しい引数が与えられているか検証            
            self::_isRightArgumentsNum(func_get_args());
            self::_isIntFirstArgument(func_get_arg(0));
            self::_isArraySecondArgument(func_get_arg(1));
            
            //取得した値と取得後の配列をそれぞれ返却
            $arrayAfterPop['values'] = self::_getValues(func_get_arg(0), func_get_arg(1));
            $arrayAfterPop['array']  = self::_deleteElements(func_get_arg(0), func_get_arg(1));
            return $arrayAfterPop;
        
        } catch (Exception $e) {
            echo $e->getMessage;
        }
    }

    /**
     * 引数の数が正しいか検証 
     */
    protected function _isRightArgumentsNum($arguments)
    {
        if (count($arguments) !== LIMIT_AUGUMENT_NUM) throw new Exception ('引数の数が不正です');
    }

    /**
     * 第一引数がintであるか検証
     */
    protected function _isIntFirstArgument($arguments)
    {
        if (!is_int($arguments)) throw new Exception ('第一引数には半角数字を指定してください');
    }

    /**
     * 第二引数が配列であるか検証
     */
    protected function _isArraySecondArgument($arguments)
    {
        if (!is_array($arguments)) throw new Exception ('第二引数には配列を指定してください');
    }

    /**
     * 指定した個数の値を取得
     */
    protected function _getValues($num, $arrayData)
    {
        for ($i = 0; $i < $num; $i++) {
            if(empty($arrayData[$i])) break;
            $getValues[] = $arrayData[$i];
        }
        return $getValues;
    }

    /**
     * 配列から取得した値を消去
     */
    protected function _deleteElements($num, $arrayData)
    {
        for ($i = 0; $i < $num; $i++) {
            if(empty($arrayData[$i])) break;
            unset($arrayData[$i]);
        }
        foreach ($arrayData as $value) {
            $arrayAfterPop[] = $value;
        }
        return $arrayAfterPop;
    }
}
