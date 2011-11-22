<?php
require_once('/ebs1/home/y-haraguchi/php/simpletest/autorun.php');
require_once('binaryTree.class.php');

class BinaryTreeTest extends UnitTestCase {

    function testBinaryTree()
    {
        $binaryTree = new BinaryTree();
        // _isArrayの動作検証
        $this->assertTrue($binaryTree->_isArray(array()));
        $this->assertFalse($binaryTree->_isArray(123));

        // _getMedianの動作検証
        $this->assertEqual($binaryTree->_getMedian(array(1, 2)), 1);
        $this->assertEqual($binaryTree->_getMedian(array(1)), 0);
        $this->assertEqual($binaryTree->_getMedian(array(1, 2, 3, 4, 5)), 2);
    }
}
