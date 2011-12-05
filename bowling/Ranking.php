<p>
<?php

$i = 1;
foreach ($ranking as $userName => $score) {

    echo $i . '位：' . $userName . '(スコア・' . $score . ')' . '<br />' ;
    $i++;
}
?>
</p>
