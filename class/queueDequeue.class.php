<?php

require_once ('stackPop.class.php');
require_once ('const.php');

class QueueDequeue extends StackPop
{
    
    /**
     * queue・dequeueを実行 
     */
    public static function execQueueDequeue()
    {
        self::_isRightArgumentsNum(func_get_args());
        self::_isIntFirstArgument(func_get_arg(0));
        self::_isArraySecondArgument(func_get_arg(1));
        $arrayAfterDequeue['values'] = self::_getValues(func_get_arg(0), func_get_arg(1));
        $arrayAfterDequeue['array']  = self::_deleteElements(func_get_arg(0), func_get_arg(1));
        return $arrayAfterDequeue;
    }

    /**
     * 指定した数の値を配列の末尾から取得 
     */
    protected function _getValues($num, $arrayData)
    {
        $elementsNum = count($arrayData) - 1;
        for ($i = $elementsNum; $i > $elementsNum - $num ; $i--) {
            if ($i < 0) break;
            $getValues[] = $arrayData[$i];
        }
        return $getValues;
    }

    /**
     * 配列から取得した値を消去 
     */
    protected function _deleteElements($num, $arrayData)
    {
        $elementsNum = count($arrayData) - 1;
        for ($i = $elementsNum; $i > $elementsNum - $num ; $i--) {
            if ($i < 0) break;
            unset($arrayData[$i]);
        } 
        foreach ($arrayData as $value) {
            $arrayAfterDequeue[] = $value;
        }
        return $arrayAfterDequeue;
    }
}
