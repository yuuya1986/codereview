<?php

require_once ('stackPush.class.php');
require_once ('const.php');

class QueueEnqueue extends StackPush
{
    
    /**
     * queue・enqueueを実行
     */
    public static function execQueueEnqueue()
    {
        try{
            // 与えられた引数が適当か検証
            self::_isEnoughArgumentsNum(func_get_args()); 
            self::_isArrayArgument(func_get_args()); 

            // 挿入する値を配列にしてvalidation
            $addElements = self::_getAddElements(func_get_args()); 
            self::_validateAddElements($addElements);

            // 結合した配列を消去
            return self::_margeAuguments($addElements, func_get_arg(count(func_get_args()) - 1));

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * 与えられた引数を結合
     */
    protected function _margeAuguments($addElements, $addedArray)
    {
        foreach ($addElements as $addElement) {
            $addedArray[] = $addElement;
        }
        return $addedArray;
    }
}
