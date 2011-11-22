<?php

require_once 'PlayBowling.class.php';

class TestBowling extends PlayBowling
{
    public function __construct() {
        $true  = 0;
        $false = 0;
        // テストが動いてるか確認
        if (1 === 1) $true++;

        //一投目で11以上の値が出ないか100回投げてみてチェック。
        for($i = 0; $i < 100; $i++) {
            $result = $this->firstThrow();
            if ($result > 10) {
                $false++;
                break;
            }
            if ($i === 99 && $result <= 10) {
                $true++;
                break;
            }
        }








        echo 'pass : ' . $true . ' fail : ' . $false;
    }
}

$test = new TestBowling();
