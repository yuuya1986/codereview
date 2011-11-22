<?php

$binaryTree = array(1, 4, 13, 9, 5);

$targetNum = 9;

echo execSearchBinaryTree($binaryTree, $targetNum);

function execSearchBinaryTree($binaryTree, $targetNum, $searchNum = 0) 
{
    if ($searchNum === 0) sort($binaryTree);
    $median = getMedian($binaryTree);
    
    if ($binaryTree[$median] === $targetNum) {
        $searchNum++;
        echo $targetNum . 'の存在を' . $searchNum . '回の探索で見つけました。';

    } elseif ($binaryTree[$median] < $targetNum) {
        searchRightTree($binaryTree, $median, $targetNum, $searchNum);
    
    } else {
        searchLeftTree($binaryTree, $median, $targetNum, $searchNum);
    }
}

function getMedian($array)
{
    if (count($array) % 2 === 1) return (count($array) -1) / 2;
    return count($array) / 2;
}

function searchRightTree($binaryTree, $median, $targetNum, $searchNum) 
{
    $searchNum++;
    for ($i = 0; $i <= $median; $i++) {
        unset($binaryTree[$i]);
    }
    
    if (empty($binaryTree)) showFalseResult($searchNum);
    
    foreach ($binaryTree as $row) {
        $newBinaryTree[] = $row;
    }
    
    execSearchBinaryTree($newBinaryTree, $targetNum, $searchNum);
}

function searchLeftTree($binaryTree, $median, $targetNum, $searchNum)
{
    $searchNum++;
    $countArrayElement = count($binaryTree);
    
    for ($i = $median; $i < $countArrayElement; $i++) {
        unset($binaryTree[$i]);
    }

    if (empty($binaryTree)) showFalseResult($searchNum);
    
    foreach ($binaryTree as $row) {
        $newBinaryTree[] = $row;
    }
    
    execSearchBinaryTree($newBinaryTree, $targetNum, $searchNum);
}

    function showFalseResult($searchNum)
{
    echo $searchNum . '回の探索を行いましたが見つかりませんでした';
    exit;
}
