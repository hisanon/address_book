
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
        </tbody>
    </table><br />
        </div>
    <p style="width:450px; margin: 0 auto;">この内容で登録します。<br />登録するメールアドレスと電話番号の数を選択して下さい。</p>
    <div style="width:500px; margin: 0 auto;">
    <?php echo $error_msg; ?>
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="mail">メールアドレス：</label>
                </td>
                <td>
                    <select id="mail" name="mail_count">
                        <?php for($i= 1;$i<= 10;$i++){
                            echo '<option value="'.$i.'"selected >'.$i.'件</option>';
                        } ?>
                    </select>
                </td>
                <td>
                    登録　　　　
                </td>
                <td>
                    <label for="tel">電話番号：</label>
                </td>
                <td>
                    <select id="tel" name="tel_count">
                        <?php for($j= 1;$j<= 10;$j++){
                            echo '<option value="'.$j.'"selected >'.$j.'件</option>';
                        } ?>
                    </select>
                </td>
                <td style>
                    登録
                </td>
            </tr>
        </tbody>
    </table>
   <br />
   <table style="width: 200px; margin: 0 auto;">
       <tbody>
           <tr>
               <td width="150">
                   <input type="hidden" name="action" value="c_name">
                   <input type="submit" value="アドレスの登録">
               </td>
               <td width="50">
                   <input type="submit" value="戻る">
               </td>
           </tr>
       </tbody>
   </table>
    </div>
    </div>
</form>


</body>
</html>
