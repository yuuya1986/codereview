<?php

require_once ('const.php');
require_once ('setUtil.class.php');

class StackPush extends SetUtil
{
    /**
     * stack・pushを実行
     */
    public static function execStackPush()
    {
        try{
            // 与えられた引数が適当か検証
            self::_isEnoughArgumentsNum(func_num_args()); 
            self::_isArrayArgument(func_get_args()); 
            
            // 挿入する値を配列にしてvalidation
            $addElements = self::_getAddElements(func_get_args()); 
            self::_validateAddElements($addElements);

            // 結合した配列を返却 
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
        //追加される引数を逆順に配列に収納
        for ($i = count($addElements) -1; $i >= 0; $i--) {
            $reverseAddElements[] = $addElements[$i];
        }
        foreach ($addedArray as $value){
            $reverseAddElements[] = $value;
        }
        return $reverseAddElements;
    }
}
