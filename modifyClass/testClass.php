<?php

require_once('setUtil.class.php');
require_once('getUtil.class.php');
require_once('stackPush.class.php');
require_once('stackPop.class.php');
require_once('queueEnqueue.class.php');
require_once('queueDequeue.class.php');

// SetUtilのテスト
class TestSetUtil extends SetUtil 
{   

    public function __construct()
    {
        $true  = 0;
        $false = 0;

        // _isEnoughArgumentsNum()の動作検証
        $hoge = array(1, 2);
        try {
            $hoge = array(1);
            self::_isArrayArgument($hoge) === false ? $true++ : $false++;
            $false++;
        } catch (Exception $e) {
            $true++; 
        }
        is_null(self::_isEnoughArgumentsNum($hoge)) ? $true++ : $false++;

        // _isArrayArgument()の動作検証
        $hoge = array(array(1));
        is_null(self::_isArrayArgument($hoge)) ? $true++ : $false++;
        try {
            $hoge = array(1);
            self::_isArrayArgument($hoge) === false ? $true++ : $false++;
            $false++;
        } catch (Exception $e) {
            $true++; 
        }

        // _validateAddElements()の動作検証
        $hoge = array(1, 333, 431);
        is_null(self::_validateAddElements($hoge)) ? $true++ : $false++;
        try {
            $hoge = array(1, 'あいう');
            self::_validateAddElements($hoge) === false ? $true++ : $false++;
            $false++;
        } catch (Exception $e) {
            $true++; 
        }
        echo 'SetUtilテスト　pass:' . $true . '    false:' . $false . "\n";
    }

    // 抽象メソッドを定義
    protected function _margeAuguments($addElements, $addedArray){}       
}

// GetUtilのテスト
class TestGetUtil extends GetUtil
{
    public function __construct()
    {
        $true  = 0;
        $false = 0;

        // _isRightArgumentsNum()の動作検証
        $hoge = array(333, 431);
        is_null(self::_isRightArgumentsNum($hoge)) ? $true++ : $false++;
        try {
            $hoge = array(1);
            self::_isRightArgumentsNum($hoge) === false ? $true++ : $false++;
            $false++;
        } catch (Exception $e) {
            $true++; 
        }

        // _isArrayFirstArgument()の動作検証
        $hoge = array();
        is_null(self::_isArrayFirstArgument($hoge)) ? $true++ : $false++;
        try {
            $hoge = 1;
            self::_isArrayFirstArgument($hoge) === false ? $true++ : $false++;
            $false++;
        } catch (Exception $e) {
            $true++; 
        }

        // _isIntSecondArgument()の動作検証
        $hoge = 1;
        is_null(self::_isIntSecondArgument($hoge)) ? $true++ : $false++;
        try {
            $hoge = 'abc';
            self::_isIntSecondArgument($hoge) === false ? $true++ : $false++;
            $false++;
        } catch (Exception $e) {
            $true++; 
        }
        
        echo 'GetUtilテスト　pass:' . $true . '    false:' . $false . "\n";
    }

    // 抽象メソッドを定義
    protected function _getValues($arrayData, $num){}
    protected function _deleteElements($arrayData, $num){}
}

// StackPushのテスト
class TestStackPush extends StackPush
{
    public function __construct()
    {
        $true  = 0;
        $false = 0;
    
        // execStackPush()の動作検証
        $originalArray = array(1, 2, 3);
        $addedArray    = array(4, 1, 2, 3);
        self::execStackPush($originalArray, 4) === $addedArray ? $true++ : $false++;

        // _margeAuguments()の動作検証
        $originalArray = array(1, 2, 3);
        $addElements   = array(4);
        $addedArray    = array(4, 1, 2, 3);
        self::_margeAuguments($originalArray, $addElements) === $addedArray ? $true++ : $false++;
        
        echo 'StackPushテスト　pass:' . $true . '    false:' . $false . "\n";
    }
}

// StackPopのテスト
class TestStackPop extends StackPop
{
    public function __construct()
    {
        $true  = 0;
        $false = 0;
    
        // execStackPop()の動作検証
        $originalArray = array(1, 2, 3);
        $afterPopArray = array('values' => array(1, 2),
                               'array'  => array(3)
                                );
        self::execStackPop($originalArray, 2) === $afterPopArray ? $true++ : $false++;

        // execStacPop()の第2引数に、配列内の値の個数以上の値を設定した際の動作検証
        $originalArray = array(1, 2, 3);
        $afterPopArray = array('values' => array(1, 2, 3),
                               'array'  => array()
                                );
        self::execStackPop($originalArray, 4) === $afterPopArray ? $true++ : $false++;
       
        // _getValues()の動作検証      
        $array = array(1, 2, 3);
        $value = array(1, 2);
        self::_getValues($array, 2) === $value ? $true++ : $false++;

        // _deleteElements()の動作確認
        $array = array(1, 2, 3);
        $value = array(3);
        self::_deleteElements($array, 2) === $value ? $true++ : $false++;

        echo 'StackPopテスト　pass:' . $true . '    false:' . $false . "\n";
    }
}

// QueueEnqueueのテスト
class TestQueueEnqueue extends QueueEnqueue
{
    public function __construct()
    {
        $true  = 0;
        $false = 0;
    
        // execStackPush()の動作検証
        $originalArray = array(1, 2, 3);
        $addedArray    = array(1, 2, 3, 4);
        self::execQueueEnqueue($originalArray, 4) === $addedArray ? $true++ : $false++;

        // _margeAuguments()の動作検証
        $originalArray = array(1, 2, 3);
        $addElements   = array(4);
        $addedArray    = array(1, 2, 3, 4);
        self::_margeAuguments($originalArray, $addElements) === $addedArray ? $true++ : $false++;
        
        echo 'QueueEnqueueテスト　pass:' . $true . '    false:' . $false . "\n";
    }
}

// QueueDequeueのテスト
class TestQueueDequeue extends QueueDequeue
{
    public function __construct()
    {
        $true  = 0;
        $false = 0;
    
        // execQueueDequeue()の動作検証
        $originalArray = array(1,2,3);
        $afterPopArray = array('values' => array(3, 2),
                               'array'  => array(1)
                                );
        self::execQueueDequeue($originalArray, 2) === $afterPopArray ? $true++ : $false++;

        // execQueueDequeue()の第2引数に、配列内の値の個数以上の値を設定した際の動作検証
        $originalArray = array(1,2,3);
        $afterPopArray = array('values' => array(3, 2, 1),
                               'array'  => array()
                                );
        self::execQueueDequeue($originalArray, 4) === $afterPopArray ? $true++ : $false++;
       
        // _getValues()の動作検証      
        $array = array(1, 2, 3);
        $value = array(3, 2);
        self::_getValues($array, 2) === $value ? $true++ : $false++;

        // _deleteElements()の動作確認
        $array = array(1, 2, 3);
        $value = array(1);
        self::_deleteElements($array, 2) === $value ? $true++ : $false++;

        echo 'QueueDequeueテスト　pass:' . $true . '    false:' . $false . "\n";
    }
}

$test = new TestSetUtil();
$test = new TestGetUtil();
$test = new TestStackPush();
$test = new TestStackPop();
$test = new TestQueueEnqueue();
$test = new TestQueueDequeue();
