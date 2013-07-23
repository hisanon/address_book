
<?php require_once 'heder.php'; ?>

<h2 style="text-align: center">アドレス登録</h2>
<form method="post" action="index.php">
        <div style="width:35%; margin: 0 auto;">
        <p>登録者確認</p>
      <table>
        <tbody>
            <?php if(!empty($no)){ ?> <tr>
                <td>登録NO</td><td>:</td><td><?php echo $no; ?></td>
            </tr> <?php } ?>
            <tr>
                <td>名前</td><td>:</td><td><?php echo $sei_k; ?></td><td>/</td><td><?php echo $mei_k; ?></td>
            </tr>
            <tr>
                <td>フリガナ</td><td>:</td><td><?php echo $sei_f; ?></td><td>/</td><td><?php echo $mei_f; ?></td>
            </tr>
            <tr>
                <td>グループ</td><td>:</td><td colspan='3'><?php echo $group_name; ?></td>
            </tr>
        </tbody>
    </table><br />
        </div>
    <p style="width:450px; margin: 0 auto;">この内容で登録します。<br />登録するメールアドレスと電話番号を入力して下さい。</p>
    <table style="width:450px; margin: 0 auto;">
        <tbody>
            <tr>
                <td style="width:120px;">メールアドレス</td><td>：</td>
                <td><input size="40" type ="text" name="mail" value="<?php $mail; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: center">電話番号</td><td>： </td>
                <td><input size="40" type ="text" name="tel" value="<?php $tel; ?>"></td>
            </tr>
        </tbody>
    </table>
   <br />
   <table style="width: 200px; margin: 0 auto;">
       <tbody>
           <tr>
               <td width="150">
                   <input type="hidden" name="action" value="c_name">
                   <input type="submit" value="確認" name="submit">
               </td>
               <td width="50">
                   <input type="submit" value="戻る" name="submit">
               </td>
           </tr>
       </tbody>
   </table>
    </div>
    </div>
</form>


</body>
</html>
