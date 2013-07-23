
<?php require_once 'heder.php'; ?>

<div style="width:400px; margin: 0 auto;">
<h2 style="width:150px; margin: 0 auto;">アドレス編集</h2>
        <p>登録内容</p>
      <table>
        <tbody>
            <tr>
                <td style="width:100px">登録NO</td><td>:</td><td><?php echo $change_id; ?></td>
            </tr>
            <tr>
                <td>名前</td><td>:</td><td style="width:120px"><?php echo $sei_k; ?></td><td>/</td><td style="width:120px"><?php echo $mei_k; ?></td>
            </tr>
            <tr>
                <td>フリガナ</td><td>:</td><td><?php echo $sei_f; ?></td><td>/</td><td><?php echo $mei_f; ?></td>
            </tr>
            <tr>
                <td>メールアドレス</td><td>:</td><td colspan='3'><?php echo $mail; ?></td>
            </tr>
            <tr>
                <td>電話番号</td><td>:</td><td colspan='3'><?php echo $tel; ?></td>
            </tr>
            <tr>
                <td>グループ</td><td>:</td><td colspan='3'><?php echo $group_name; ?></td>
            </tr>
        </tbody>
    </table><br />
</div>
<form method ="post" action ="index.php">
<input type="hidden" name="action" value="change2">
<table style="width:300px; margin: 0 auto;">
    <tbody>
        <tr>
            <td style="width:100px;">
                    <input type="submit" value="編集" name="submit">
            </td>
            <td style="width:100px;">
                    <input type="submit" value="追加" name="submit">
            </td>
            <td style="width:100px;">
                    <input type="submit" value="削除" name="submit">
            </td>
        </tr>
    </tbody>
</table>
</form>

<br /><br />
<?php





