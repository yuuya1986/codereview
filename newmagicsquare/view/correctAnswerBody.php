<?php require_once '../model/util.php'; ?>

<p>
<h1>正解！！</h1>
</p>

<p>
<table border="1" width="130" height="130">
    <tr align="center">
        <td><?php echo h($over[0]); ?></td>
        <td><?php echo h($over[1]); ?></td>
        <td><?php echo h($over[2]); ?></td>
    </tr>
    <tr align="center">
        <td><?php echo h($middle[0]); ?></td>
        <td><?php echo h($middle[1]); ?></td>
        <td><?php echo h($middle[2]); ?></td>
    </tr>
    <tr align="center">
        <td><?php echo h($under[0]); ?></td>
        <td><?php echo h($under[1]); ?></td>
        <td><?php echo h($under[2]); ?></td>
    </tr>
</table>
</p>

<p>
<a href="../controller/index.php">もう一度やる</a>
</p>
