<?php
require_once('/ebs1/home/y-haraguchi/php/simpletest/autorun.php');
require_once('../review/sort.php');
class SortTestCase extends UnitTestCase {

    function testSortCheck() {
        $this->assertSame(num_sort(321), '123');                        //数(integer)。
    	$this->assertSame(num_sort('321'), '123');                      //数(string)。
    	$this->assertSame(num_sort(1), '1');                            //一桁の数(integer)。
    	$this->assertSame(num_sort('1'), '1');                          //一桁の数(string)。
    	$this->assertSame(num_sort(090), '0');                          //0が頭についた場合(integer)。
    	$this->assertSame(num_sort('090'), '009');				    	//0が頭についた場合(string)。
    	$this->assertSame(num_sort(98765432104), '01234456789');        //11桁以上の数(integer)。
    	$this->assertSame(num_sort('98765432104'), '01234456789');      //11桁以上の数(string)。
    }
    
//マイナスの数(integer)
    function testExeption(){
       try {
           num_sort(-123);    
           $this->fail();
       }catch(Exception $e){
           $this->pass();    
       }     
    }    

//マイナスの数(string)
    function testExeption2(){
       try {
           num_sort('-123');    
           $this->fail();
       }catch(Exception $e){
           $this->pass();    
       }
   } 

//空の値
    function testExeption3(){
       try {
           num_sort('');    
           $this->fail();
       }catch(Exception $e){
           $this->pass();    
       }
    }

//null
    function testExeption4(){
       try {
           num_sort(null);    
           $this->fail();
       }catch(Exception $e){
           $this->pass();    
       }
    }

//アルファベット
    function testExeption5(){
       try {
           num_sort('abc');    
           $this->fail();
       }catch(Exception $e){
           $this->pass();    
       }
    }

//ひらがな
    function testExeption6(){
       try {
           num_sort('あいう');    
           $this->fail();
       }catch(Exception $e){
           $this->pass();    
       }
    }
}
