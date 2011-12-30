<?php require_once '../model/util.php'; ?>

<p>
<h1>魔方陣が空前の大ブームです</h1>
縦、横、斜めの列の合計値を揃えましょう<br />
※半角数字で入力してください
</p>

<p>
<form method="POST" action="../controller/exec.php">
    <table border="1" width="130" height="130">
        <tr>
            <td><input type="text" name="overRecord[]" size="3" maxlength="4" value="<?php if (!empty($over[0])) echo h($over[0]); ?>"></td>
            <td><input type="text" name="overRecord[]" size="3" maxlength="4" value="<?php if (!empty($over[1])) echo h($over[1]); ?>"></td>
            <td><input type="text" name="overRecord[]" size="3" maxlength="4" value="<?php if (!empty($over[2])) echo h($over[2]); ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="middleRecord[]" size="3" maxlength="4" value="<?php if (!empty($middle[0])) echo h($middle[0]); ?>"></td>
            <td><input type="text" name="middleRecord[]" size="3" maxlength="4" value="<?php if (!empty($middle[0])) echo h($middle[1]); ?>"></td>
            <td><input type="text" name="middleRecord[]" size="3" maxlength="4" value="<?php if (!empty($middle[0])) echo h($middle[2]); ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="underRecord[]" size="3" maxlength="4" value="<?php if (!empty($under[0])) echo h($under[0]); ?>"></td>
            <td><input type="text" name="underRecord[]" size="3" maxlength="4" value="<?php if (!empty($under[1])) echo h($under[1]); ?>"></td>
            <td><input type="text" name="underRecord[]" size="3" maxlength="4" value="<?php if (!empty($under[2])) echo h($under[2]); ?>"></td>
        </tr>
    </table>
</p>

<p>
    <input type="submit" value="回答">

</form>

<form action="../controller/index.php">
    <input type="submit" value="リセット">
</form>
</p>

<p>
<?php
if (isset($errorMessages)) {
    foreach ($errorMessages as $errorMessage) {
        echo $errorMessage . '<br />';
    }
}
?>
</p>
