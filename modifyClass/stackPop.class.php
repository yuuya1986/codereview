<?php

require_once ('const.php');
require_once ('getUtil.class.php');

class StackPop extends GetUtil
{
    
    /**
     * stack・popを実行
     */
    public static function execStackPop()
    {
        try {
            // 正しい引数が与えられているか検証            
            self::_isRightArgumentsNum(func_get_args());
            
            $firstArgument  = func_get_arg(0);
            $secondArgument = func_get_arg(1);
            self::_isArrayFirstArgument($firstArgument);
            self::_isIntSecondArgument($secondArgument);
            
            //取得した値と取得後の配列をそれぞれ返却
            $arrayAfterPop['values'] = self::_getValues($firstArgument, $secondArgument);
            $arrayAfterPop['array']  = self::_deleteElements($firstArgument, $secondArgument);
            return $arrayAfterPop;
        
        } catch (Exception $e) {
            echo $e->getMessage;
        }
    }
    /**
     * 指定した個数の値を取得
     */
    protected function _getValues($arrayData, $num)
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
    protected function _deleteElements($arrayData, $num)
    {
        for ($i = 0; $i < $num; $i++) {
            if(empty($arrayData[$i])) break;
            unset($arrayData[$i]);
        }

        $arrayAfterPop = array();
        foreach ($arrayData as $value) {
            $arrayAfterPop[] = $value;
        }
        return $arrayAfterPop;
    }
}
