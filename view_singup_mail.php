
<?php require_once 'heder.php'; ?>

<h2 style="text-align: center">アドレス登録</h2>
<form method="post" action="index.php">
    <div style="width:200px; margin: 0 auto;">
        <p style="text-align: center">登録者</p>
      <table>
        <tbody>
            <tr>
                <td>登録NO</td><td>:</td><td><?PHP echo $_SESSION['no']; ?></td>
            </tr>
            <tr>
                <td>名前</td><td>:</td><td><?PHP echo $_SESSION['sei_k']; ?></td><td>/</td><td><?PHP echo $_SESSION['mei_k']; ?></td>
            </tr>
            <tr>
                <td>フリガナ</td><td>:</td><td><?PHP echo $_SESSION['sei_f']; ?></td><td>/</td><td><?PHP echo $_SESSION['mei_f']; ?></td>
            </tr>
        </tbody>
    </table><br />
    </div>
    <div style="width:440px; margin: 0 auto;">
    <p>アドレスと電話番号を入力して下さい。</p>
    <table>
        <tbody>
            <tr>
                <td>メールアドレス</td><td>：</td>
                <td><?php 
                    while($count_no <=$mail_count){
                    '<input size="40" type ="text" name="tel_1" value="'.$count_no.'"><br />';
                    $count_no ++;
                    } ?>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">電話番号</td><td>：</td>
                <td>
                    <input size="40" type ="text" name="tel_1" value="">
                </td>
            </tr>
        </tbody>
    </table>
   <br />
    <div style="text-align: center">
        <input type="hidden" name="action" value="c_mail"> 
        <input type="submit" value="確認">
    </div>
    </div>
</form>


</body>
</html>
