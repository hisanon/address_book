
<?php require_once 'heder.php';
require_once 'model.php';?>

<div  style="text-align: center">
<h2>名前登録</h2>
<p>アドレス帳に登録する名前を入力してください</p>
<p style="color:red;"><?php echo $error_msg; ?></p>
</div>
<div style="text-align: center; color:red;"><?php echo $erro_msg; ?></div>
<form method="post" action="index.php " >
    <table style="width:60%; margin: 0 auto;">
        <tbody>
            <tr>
                <td>登録NO</td><td>:</td><td><input size="7" type="text" id="no" name="no" value="<?php echo $no; ?>" style="font-size:15px"></td><td colspan="5" class="red">※登録NOは入力が無い場合自動入力します</td><br />
            </tr>
            <tr>
                <td style="text-align: center"><label for="sei_k">名字</label></td><td><label for="sei_k">:</label></td><td><input size="12" type="text" id="sei_k" name="sei_k" value="<?php echo $sei_k; ?>" style="font-size:15px"></td><td style="font-size:small">例:山田　　</td>　　　　
                <td><label for="mei_k">名前</label></td><td><label for="mei_k">:</label></td><td><input size="12" type="text" id="mei_k" name="mei_k" value="<?php echo $mei_k; ?>" style="font-size:15px"></td><td style="font-size:small">例:ヤマダ</td>
            </tr>
            <tr>
                <td style="text-align: center"><label for="sei_f">カナ</label></td><td><label for="sei_f">:</label></td><td><input size="12" type="text" id="sei_f" name="sei_f" value="<?php echo $sei_f; ?>" style="font-size:15px"></td><td style="font-size:small">例:太郎　　</td>　　　
                <td><label for="mei_f">カナ</label></td><td><label for="mei_f">:</label></td><td><input size="12" type="text" id="mei_f" name="mei_f" value="<?php echo $mei_k; ?>" style="font-size:15px"></td><td style="font-size:small">例:タロウ</td>
            </tr>
            <tr>
                <td>グループ</td><td>:</td>
                <td cospan="5">
                    <select id="group" name="group_no">
                        <option value="1" selected >-------</option>
                        <?php $sth= SELECTGROUP($db);
                        while($row =$sth->fetch(PDO::FETCH_ASSOC)){
                           $group_no = $row['group_no'];
                           $group_name = $row['group_name'];
                                echo '<option value="'.$group_no.'">'.$group_name.'</option>';
                        } ?>
                    </select>
                </td>
            </tr>
        </tbody>
    </table><br />
    <div style="text-align: center">
        <input type="hidden" name="action" value="s_name">
        <input type="submit" value="名前の登録">
    </div>
</form>


</body>
</html>

