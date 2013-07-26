
<?php require_once 'heder.php'; ?>


<?php echo $edit.'/'.$mail.'/'.$tel; ?>

<form method ="post" action ="index.php">
<div style="width:400px; margin: 0 auto;">
<h2 style="width:150px; margin: 0 auto;">アドレス編集</h2>
        <p>登録内容</p>
      <table>
        <tbody>
            <tr>
                <td style="width:100px">登録NO</td><td>:</td>
                    <?php if($edit == change){ ?>
                        <td colspan='3'><input type="text" name="id" value="<?php echo $id; ?>"></td>
                    <?php } else{ ?>
                        <td colspan='3'><?php echo $id; ?></td>
                    <?php } ?>
            <tr>
                <td>名前</td><td>:</td><td style="width:120px">
                    <?php if($edit == change){ ?>
                        <input type="text" name="sei_k" value="<?php echo $sei_k; ?>"></td><td>/</td><td style="width:120px"><input type="text" name="mei_k" value="<?php echo $mei_k; ?>"></td>
                   <?php } else{ ?>
                        <?php echo $sei_k; ?></td><td>/</td><td style="width:120px"><?php echo $mei_k; ?></td>
                    <?php } ?>
            </tr>
            <tr>
                <td>フリガナ</td><td>:</td>
                    <?php if($edit == change){ ?>
                        <td><input type="text" name="sei_f" value="<?php echo $sei_f; ?>"></td><td>/</td><td><input type="text" name="mei_f" value="<?php echo $mei_f; ?>"></td>
                    <?php } else{ ?>
                        <td><?php echo $sei_f; ?></td><td>/</td><td><?php echo $mei_f; ?></td>
                    <?php } ?>
            </tr>
            <tr>
                <td>メールアドレス</td><td>:</td>
                     <?php if($edit == change){ ?>
                        <td colspan='3'><input size="30" type="text" name="mail" value="<?php echo $mail; ?>" ></td>
                     <?php } else{ ?>
                        <td colspan='3'>
                     <?php $sth3= MAILDATA($db,$id);
                        while($row =$sth3->fetch(PDO::FETCH_ASSOC)){
                        $mail_id=$row['mail_id'];
        
                       $sth4=MAILIDDATA($db,$mail_id);
                       $row =$sth4->fetch(PDO::FETCH_ASSOC);
                       $mail=$row['mail'];
                    
                       echo $mail.'<br />';;
                     } ?>　</td>
                        <?php if($edit == adding){ ?> 
                            </tr><tr><td>追加アドレス</td><td>:</td>
                            <td colspan='3'><input  size="30" type="text" name="mail_2" value="" ></td>
                        <?php } elseif(!empty($mail_2)){ ?>
                            </tr><tr><td>追加アドレス</td><td>:</td>
                            <td colspan='3'><?php echo $mail_2; ?></td>
                        <?php } ?>
                     <?php } ?>
            </tr>
            <tr>
                <td>電話番号</td><td>:</td>
                     <?php if($edit == change){ ?>
                        <td colspan='3'><input type="text" name="tel" value="<?php echo $tel; ?>" ></td>
                     <?php } else{ ?>
                        <td colspan='3'>
                     <?php $sth5= TELDATA($db,$id);
                        while($row =$sth5->fetch(PDO::FETCH_ASSOC)){
                        $tel_id=$row['tel_id']; 
                
                        $sth6 = TELIDDATA($db,$tel_id);
                        $row =$sth6->fetch(PDO::FETCH_ASSOC);
                        $tel=$row['tel'];
                    
                        echo $tel.'<br />';
                     } ?></td>
                            <?php if($edit == adding){ ?> 
                                </tr><tr><td>追加電話番号</td><td>:</td>
                                <td colspan='3'><input type="text" name="tel_2" value="" ></td>
                            <?php } elseif(!empty($tel_2)){ ?>
                                </tr><tr><td>追加電話番号</td><td>:</td>
                                <td colspan='3'><?php echo $tel_2; ?></td>
                            <?php } ?>
                     <?php } ?>
            </tr>
            <tr>
                <td>グループ</td><td>:</td><td colspan='3'><?php echo $group_name; ?></td>
            </tr>
            <?php if($edit == change){ ?>
            <tr>
                <td></td><td></td>
                    <td colspan='3'>
                        <select id="group" name="group_no">
                            <option value="0" selected >-------</option>
                            <?php $sth= SELECTGROUP($db);
                            while($row =$sth->fetch(PDO::FETCH_ASSOC)){
                                $group_no = $row['group_no'];
                                $group_name = $row['group_name'];
                                    echo '<option value="'.$group_no.'">'.$group_name.'</option>';
                            } ?>
                        </select>
                    </td>
            </tr>
            <?php } ?>
        </tbody>
    </table><br />
</div>
<table style="width:300px; margin: 0 auto;">
    <tbody>
        <?php if($edit == delete){ ?>
        <input type="hidden" name="action" value="change4">
        <tr>
            <td colspan="2" style="color:red; text-align: center; width:180px; margin: 0auto">
                この内容を削除します。<br />よろしいですか?
            </td>
        </tr>
        <tr>
            <td style="width:150px; text-align: center; margin: 0auto">
                    <input type="submit" value="削除" name="submit">
            </td>
            <td style="width:150px; text-align: center; margin: 0auto">
                    <input type="submit" value="戻る" name="submit">
            </td>
        </tr>
        <?php } elseif($edit == adding){ ?>
        <input type="hidden" name="action" value="change3">
        <tr>
            <td colspan="2" style="color:red; text-align: center; width:180px; margin: 0auto">
                追加内容を入力して下さい。
            </td>
        </tr>
        <tr>
            <td style="width:150px; text-align: center; margin: 0auto">
                    <input type="submit" value="追加確認" name="submit">
            </td>
            <td style="width:150px; text-align: center; margin: 0auto">
                    <input type="submit" value="戻る" name="submit">
            </td>
        </tr>
        <?php } elseif($edit == change){ ?>
        <input type="hidden" name="action" value="change3">
        <tr>
            <td colspan="2" style="color:red; text-align: center; width:180px; margin: 0auto">
                変更内容を入力して下さい。
            </td>
        </tr>
        <tr>
            <td style="width:150px; text-align: center; margin: 0auto">
                    <input type="submit" value="変更確認" name="submit">
            </td>
            <td style="width:150px; text-align: center; margin: 0auto">
                    <input type="submit" value="戻る" name="submit">
            </td>
        </tr>
        <?php } elseif($edit == confirm_change){ ?>
        <input type="hidden" name="action" value="change4">
        <tr>
            <td colspan="2" style="color:red; text-align: center; width:180px; margin: 0auto">
                この内容に変更します。<br />よろしいですか？
            </td>
        </tr>
        <tr>
            <td style="width:150px; text-align: center; margin: 0auto">
                    <input type="submit" value="変更" name="submit">
            </td>
            <td style="width:150px; text-align: center; margin: 0auto">
                    <input type="submit" value="戻る" name="submit">
            </td>
        </tr>
        <?php } elseif($edit == confirm_adding){ ?>
        <input type="hidden" name="action" value="change4">
        <tr>
            <td colspan="2" style="color:red; text-align: center; width:180px; margin: 0auto">
                この内容に変更します。<br />よろしいですか？
            </td>
        </tr>
        <tr>
            <td style="width:150px; text-align: center; margin: 0auto">
                    <input type="submit" value="追加" name="submit">
            </td>
            <td style="width:150px; text-align: center; margin: 0auto">
                    <input type="submit" value="戻る" name="submit">
            </td>
        </tr>
        <?php } else{ ?>
        <input type="hidden" name="action" value="change2">
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
        <?php } ?> 
    </tbody>
</table>
</form>







