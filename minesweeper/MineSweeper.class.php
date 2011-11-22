<?php

/**
 *
 * TDD方式にてマインスイーパーを作成
 * 
 * 【仕様】
 * ・第1引数は爆弾MAPが入った配列
 * ・第2引数は指定するポジション
 * ・指定した場所に爆弾があった場合はそこで終了
 * ・指定した場所に爆弾がなかった場合は周辺8マスの爆弾の数を表示
 *
 * @author 原口悠哉 Yuya_Haraguchi@voyagegroup.com
 * @date   2011-10-27
 *
 */

require_once('/ebs1/home/y-haraguchi/php/simpletest/autorun.php');

class MineSweeperTest extends UnitTestCase
{
    public function testMineSweeper()
    {
        $map = array(
                    array(1, 0, 0),
                    array(0, 0, 1),
                    array(1, 0, 0)
                    );
        $exec = new MineSweeper($map);
        
        // _setMap()の挙動確認
        $this->assertNull($exec->_setMap(array(1, 1)));

        // _isArray()の挙動確認
        $this->assertTrue($exec->_isArray(array(1, 1)));
        $this->assertFalse($exec->_isArray(1));
        
        // 第2引数にintが入った配列が入っているか検証
        $test     = array(1, 1);
        $hoge     = array('a', 1);
        $this->assertTrue($exec->_isArray($test));
        $this->assertTrue($exec->_isArray($hoge));
        $this->assertTrue($exec->_isIntSecondArgContents($test));
        $this->assertTrue($exec->_isIntSecondArgContents($test));
    
        // _isBomb()の挙動検証
        $this->assertNull($exec->_isBomb(array(0, 1)));
        $this->assertTrue($exec->_isBomb(array(0, 0)));
  
        // 指定したポイントの左側列の値を取得
        $this->assertEqual($exec->_getLeftRawNum(array(1, 1)), 2);
    
        // 指定したポイントの当該列の値を取得
        $this->assertEqual($exec->_getCenterRawNum(array(1, 1)), 0);
        
        // 指定したポイントの右側列の値を取得
        $this->assertEqual($exec->_getRightRawNum(array(1, 1)), 1);
        
        //実行メソッドの値を検証
        $this->assertFalse($exec->execMineSweeper(array(0, 0)));
        $this->assertEqual($exec->execMineSweeper(array(1, 0)), 2);
        $this->assertFalse($exec->execMineSweeper(array(2, 0)));
        $this->assertEqual($exec->execMineSweeper(array(0, 1)), 2);
        $this->assertEqual($exec->execMineSweeper(array(1, 1)), 3);
        $this->assertEqual($exec->execMineSweeper(array(2, 1)), 2);
        $this->assertEqual($exec->execMineSweeper(array(0, 2)), 1);
        $this->assertFalse($exec->execMineSweeper(array(1, 2)));
        $this->assertEqual($exec->execMineSweeper(array(2, 2)), 1);
    }
}

class MineSweeper
{
    public $map;

    public function __construct($map)
    {
        self::_setMap($map);
    }

    public function execMineSweeper($place)
    {
        // 値のバリデーション
        if (!self::_isArray($map)) exit;
        if (!self::_isArray($place)) exit;
        if (!self::_isIntSecondArgContents($place)) exit;
        
        // 指定したポイントに地雷があったら終了
        if (self::_isBomb($place)) return false;
        
        // 指定したポイントの周り8マスの地雷の数を返却
        $num = 0;
        $num += self::_getLeftRawNum($place);
        $num += self::_getCenterRawNum($place);
        $num += self::_getRightRawNum($place);
        return $num;
    }
    
    public function _setMap($map)
    {
        if (!is_array($map)) return false;
        foreach ($map as $line) {
            foreach ($line as $value){
                if (!is_int($value))  return false;
            }
        }
        $this->map = $map;
    }

    // 引数が配列か検証
    public function _isArray($array)
    {
        if (is_array($array)) return true;
    }
    
    // 第2引数がintのみが代入されている配列か検証
    public function _isIntSecondArgContents($place)
    {
        foreach ($place as $value) {
            if (!is_int($value)) return false;
        }
        return true;
    }
    
    // 爆弾があるポイントを指定した場合trueを返す
    public function _isBomb($test)
    {
        if (!empty($this->map[$test[0]][$test[1]])) return True;
    }

    
    // 指定したポイントの左側列の値を取得
    public function _getLeftRawNum($place)
    {
        $num = 0;
        for ($i = -1; $i <= 1; $i++){
            if (!empty($this->map[$place[0] + $i][$place[1] - 1])) $num += $this->map[$place[0] + $i][$place[1] - 1];
        }
        return $num;
    }
    
    // 指定したポイントの当該列の値を取得
    public function _getCenterRawNum($place)
    {
        $num = 0;
        for ($i = -1; $i <= 1; $i += 2){
            if (!empty($this->map[$place[0] + $i][$place[1]])) $num += $this->map[$place[0] + $i][$place[1]];
        }
        return $num;
    }

    // 指定したポイントの右側列の値を取得
    public function _getRightRawNum($place)
    {
        $num = 0;
        for ($i = -1; $i <= 1; $i++){
            if (!empty($this->map[$place[0] + $i][$place[1] + 1])) $num += $this->map[$place[0] + $i][$place[1] + 1];
        }
        return $num;
    }
}
