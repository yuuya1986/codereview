<?php

require_once 'header.tpl';

foreach ($errorMessages as $errorMessage) {
    echo '<p>' .$errorMessage . '</p>';
}
?>

<p><a href="http://y-haraguchi.s-tanno.com/codereview/bowling/PlayBowling.html">戻る</a></p>

<?php
require_once 'footer.tpl';
