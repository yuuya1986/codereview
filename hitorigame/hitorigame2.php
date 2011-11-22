<?php

$hoge[] = 10;
$hoge[] = 21;
$huga[] = '';

function divided5($hoge = array())
{
    for($i = 0; $i < count($hoge); $i++) {
        if ($hoge[$i] % 5 !== 0) {
            return false;
        }
    }
    return true;
}

function checkallnothing($hoge = array())
{
    for($i = 0; $i < count($hoge); $i++) {
        if ($hoge[$i] !== '') {
            return false;
        }
    }    
    return true;
}

function divide5AllNum($hoge = array())
{
    for($i = 0; $i < count($hoge); $i++) {
        if ($hoge[$i] % 5 === 0) {
            $hoge[$i] = '';
        }
    }
    return $hoge;
}

function divide2AllNum($hoge = array())
{
    for($i = 0; $i < count($hoge); $i++) {
        if ($hoge[$i] % 2 !== 0) {
            $hoge[$i] = ($hoge[$i] / 2) - 0.5;
        } else {
            $hoge[$i] = $hoge[$i] / 2;
        }
    }
    return $hoge;
}


function execCalculate($hoge, $count)
{    
    if (divided5($hoge) === true) {
        $count++;
        $hoge = divide5AllNum($hoge);
        if (checkallnothing($hoge) === true) {
            echo  $count;
        } else {
            $count++;
            $hoge = divide2AllNum($hoge);
            execCalculate($hoge, $count);
        }
    } else {
        $count++;
        $hoge = divide2AllNum($hoge);
        execCalculate($hoge, $count);
    }
}

$count = 0;
execCalculate($hoge, $count);
