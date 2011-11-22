<?php

require_once ('const.php');

class StackPush
{
    /**
     * stack・pushを実行
     */
    public static function execStackPush()
    {
        try{
            // 与えられた引数が適当か検証
            self::_isEnoughArgumentsNum(func_get_args()); 
            self::_isArrayArgument(func_get_args()); 
            
            // 挿入する値を配列にしてvalidation
            $addElements = self::_getAddElements(func_get_args()); 
            self::_validateAddElements($addElements);

            // 結合した配列を返却 
            return self::_margeAuguments($addElements, func_get_arg(count(func_get_args()) - 1));

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

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
        if (!is_array($arguments[count($arguments)-1])) throw new Exception ('引数の最後に配列が与えられていません');
    }

    /**
     * 配列に追加する値を取得
     */
    protected function _getAddElements($arguments)
    {
        for ($i = 0; $i < count($arguments) - 1; $i++) {
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

    /**
     * 与えられた引数を結合
     */
    protected function _margeAuguments($addElements, $addedArray)
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
