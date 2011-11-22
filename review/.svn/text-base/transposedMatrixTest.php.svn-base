<?php
require_once('/ebs1/home/y-haraguchi/php/simpletest/autorun.php');
require_once('../review/transposedMatrix.php');
class SortTestCase extends UnitTestCase {

    //配列以外を入力
    function testExeption(){
        try {
            transposedMatrix('hoge');
            $this->fail();
        }catch(Exception $e){
            $this->pass();
        }  
    }

    //配列のキー毎に異なる値の数を代入
    function testException2(){
        $testArray = array(
                        array(1,2),
                        array(1,2,3) 
                          );
         try {
           transposedMatrix($testArray);    
           $this->fail();
       }catch(Exception $e){ 
           $this->pass();
       }
    }
}
