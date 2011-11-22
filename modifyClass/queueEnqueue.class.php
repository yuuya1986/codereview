<?php

require_once ('setUtil.class.php');
require_once ('const.php');

class QueueEnqueue extends SetUtil
{
    
    /**
     * queue・enqueueを実行
     */
    public static function execQueueEnqueue()
    {
        try{
            // 与えられた引数が適当か検証
            self::_isEnoughArgumentsNum(func_num_args()); 
            self::_isArrayArgument(func_get_args()); 

            // 挿入する値を配列にしてvalidation
            $addElements = self::_getAddElements(func_get_args()); 
            self::_validateAddElements($addElements);

            // 結合した配列を消去
            return self::_margeAuguments(func_get_arg(0), $addElements);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * 与えられた引数を結合
     */
    protected function _margeAuguments($addedArray, $addElements)
    {
        foreach ($addElements as $addElement) {
            $addedArray[] = $addElement;
        }
        return $addedArray;
    }
}
