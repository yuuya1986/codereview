<?php

class BinaryTree
{

    /**
     * 探索を実行 
     */
    public function execSearchBinaryTree($binaryTree, $targetNum, $searchNum = 0)
    {
        $median = $this->_getMedian($binaryTree);

        if ($searchNum === 0) {
            $this->_validateArguments($binaryTree, $targetNum);
            sort($binaryTree);
        }

        if($binaryTree[$median] === $targetNum) {
            $this->_showResult($targetNum, $searchNum);

        } elseif ($binaryTree[$median] < $targetNum) {
            $this->_searchRightTree($binaryTree, $median, $targetNum, $searchNum);

        } else {
            $this->_searchLeftTree($binaryTree, $median, $targetNum, $searchNum);
        }
    }

    /**
     * 中間キーを取得 
     */
    public function _getMedian($array)
    {
        $this->_isArray($array);
        if (count($array) % 2 === 1) return (count($array) -1) / 2;
        return count($array) / 2;
    }

    /**
     * 各種Validateを行う。 
     */
    public function _validateArguments($binaryTree, $targetNum)
    {
        if (!$this->_isArray($binaryTree))             $error = '';
        if (!$this->_isIntArrayContents($binaryTree))  $error = '';
        if (!$this->_isInt($targetNum))                $error = '';
        if (isset($error)) die ('不正な値が入力されました');
    }

    /**
     * intか否かの判別
     */
    public function _isInt($num)
    {
        if(is_int($num)) return true;
        return false;
    }

    /**
     * arrayの中身がintか判別
     */
    public function _isIntArrayContents($array)
    {
        foreach ($array as $row) {
            if (!is_int($row)) return false;
        }
        return true;
    }

    /**
     * 配列か否か判別
     */
    public function _isArray($array)
    {
        if (is_array($array)) return true;
        return false;
    }

    /**
     * 中間キーより大きい値のキー探索を実行 
     */
    public function _searchRightTree($binaryTree, $median, $targetNum, $searchNum)
    {
        $searchNum++;

        for ($i = 0; $i <= $median; $i++) {
            unset($binaryTree[$i]);
        }

        if (empty($binaryTree)) $this->_showFalseResult($searchNum);

        foreach ($binaryTree as $row) {
            $newBinaryTree[] = $row;
        }

        $this->execSearchBinaryTree($newBinaryTree, $targetNum, $searchNum);
    }

    /**
     * 中間キーより大きい値のキー探索を実行 
     */
    public function _searchLeftTree($binaryTree, $median, $targetNum, $searchNum)
    {
        $searchNum++;
        $countArrayElement = count($binaryTree);

        for ($i = $median; $i < $countArrayElement; $i++) {
            unset($binaryTree[$i]);
        }

        if (empty($binaryTree)) $this->_showFalseResult($searchNum);

        foreach ($binaryTree as $row) {
            $newBinaryTree[] = $row;
        }

        $this->execSearchBinaryTree($newBinaryTree, $targetNum, $searchNum);
    }

    /**
     * 探索したい値が見つかった場合の結果を表示
     */
    public function _showResult($targetNum, $searchNum)
    {
        $searchNum++;
        echo $targetNum . 'の存在を' . $searchNum . '回の探索で見つけました';
    }

    /**
     * 探索したい値が見つからなかった場合の結果を表示
     */
    public function _showFalseResult($searchNum)
    {
        echo $searchNum . '回の探索を行いましたが見つかりませんでした';
        exit;
    }
}
