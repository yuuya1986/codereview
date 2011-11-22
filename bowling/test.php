<?php

$hoge = array(1, 2);

function hoge()
{
    var_dump(func_get_args());
}
hoge($hoge);
