<h1>ボーリングが空前のブームです</h1>

名前を入れるとランダムでスコアが生成されて順位がでるよー。<br />
※名前は10文字以内で入力してください。

<form method="post" action="../controller/result.php">

<p>
名前1:<br />
<input type="text" name="userNames[]" size="40" maxlength="10" value="<?php if(!empty($_POST['userNames'][0])) echo $_POST['userNames'][0]; ?>"/>
</p>

<p>
名前2:<br />
<input type="text" name="userNames[]" size="40" maxlength="10" value="<?php if(!empty($_POST['userNames'][1])) echo $_POST['userNames'][1]; ?>"/>
</p>

<p>
名前3:<br />
<input type="text" name="userNames[]" size="40" maxlength="10" value="<?php if(!empty($_POST['userNames'][2])) echo $_POST['userNames'][2]; ?>"/>
</p>

<p>
名前4:<br />
<input type="text" name="userNames[]" size="40" maxlength="10" value="<?php if(!empty($_POST['userNames'][3])) echo $_POST['userNames'][3]; ?>"/>
</p>

<p>
名前5:<br />
<input type="text" name="userNames[]" size="40" maxlength="10" value="<?php if(!empty($_POST['userNames'][4])) echo $_POST['userNames'][4]; ?>"/>
</p>

<p>
<input type="submit" value="対戦!!">
</form>
<form action="">
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
