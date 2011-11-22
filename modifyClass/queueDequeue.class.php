<?php

require_once ('const.php');
require_once ('getUtil.class.php');

class QueueDequeue extends getUtil 
{

    /**
     * queue・dequeueを実行 
     */
    public static function execQueueDequeue()
    {
        self::_isRightArgumentsNum(func_get_args());

        $firstArgument  = func_get_arg(0);
        $secondArgument = func_get_arg(1);

        self::_isArrayFirstArgument($firstArgument);
        self::_isIntSecondArgument($secondArgument);
        $arrayAfterDequeue['values'] = self::_getValues($firstArgument, $secondArgument);
        $arrayAfterDequeue['array']  = self::_deleteElements($firstArgument, $secondArgument);
        return $arrayAfterDequeue;
    }

    /**
     * 指定した数の値を配列の末尾から取得 
     */
    protected function _getValues($arrayData, $num)
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
    protected function _deleteElements($arrayData, $num)
    {
        $elementsNum = count($arrayData) - 1;
        for ($i = $elementsNum; $i > $elementsNum - $num ; $i--) {
            if ($i < 0) break;
            unset($arrayData[$i]);
        } 
        
        $arrayAfterDequeue = array();
        foreach ($arrayData as $value) {
            $arrayAfterDequeue[] = $value;
        }
        return $arrayAfterDequeue;
    }
}
