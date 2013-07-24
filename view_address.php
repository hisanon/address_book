<!---アドレス一覧の表示--->
<?php require_once 'model.php'; ?>
<h3 style="color:red;"><?php echo $msg; ?></h3>
<?php $dtcnt = COUNTS($db,$name,$comment,$pass); ?>
		全登録数<?php echo $dtcnt; ?>件

<table border="1" cellspacing="0" cellpadding="5">
    <tr style="background:#99CCFF">
        <td width="35" align="center">登録NO</td>
        <td width="130">名字(カナ)</td>
        <td width="130">名前(カナ)</td>
        <td width="280">メールアドレス</td>
        <td width="180">電話番号</td>
        <td width="145">グループ</td>
        <td width="45" align="center">編集</td>
    </tr>

<?php
while($row =$sth->fetch(PDO::FETCH_ASSOC)){
                
    $id = $row['id'];
    $sei_k = $row['sei_k'];
    $mei_k = $row['mei_k'];
    $sei_f =$row['sei_f'];
    $mei_f =$row['mei_f'];
    $group_no =$row['group_no'];
    
    $sth3= MAILDATA($db,$id);
    $row =$sth3->fetch(PDO::FETCH_ASSOC);
    $mail=$row['mail'];
    
    $sth4= TELDATA($db,$id);
    $row =$sth4->fetch(PDO::FETCH_ASSOC);
    $tel=$row['tel'];
            
    $sth2= GROUPDATA($db,$group_no);
    $row =$sth2->fetch(PDO::FETCH_ASSOC);
	
    $group_name =$row['group_name'];
 ?>
    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $sei_k.'('.$sei_f.')'; ?></td>
        <td><?php echo $mei_k.'('.$mei_f.')'; ?></td>
        <td><?php echo $mail; ?></td>
        <td><?php echo $tel; ?></td>
        <td><?php echo $group_name; ?></td>
        <td><form method="post" action="index.php" >
                <input type="hidden" value="<?php echo $id; ?>" name="change_id" />
                <input type="hidden" value="change" name="action" />
                <input type="submit" value="編集" name="submit" />
            </form>
        </td>
    </tr>

<?php } ?>

</table>
<table>
    <tr>
        <td style="text-align: left; width:320px">
          <?php if($p>1){ ?>
            <a href ="<?php $_SERVER['PHP_SELF']; ?>?p=<?php echo $prev; ?>">←前のページ</a>
          <?php } ?>            
        </td>
        <td style="text-align: center;width:320px">
            <?php echo $prev.'ページ目'; ?> 
        </td>
        <td style="text-align: right; width:320px">
          <?php if(($next -1) * $lim < $dtcnt){ ?>
            <a href ="<?php $_SERVER['PHP_SELF']; ?>?p=<?php echo $next; ?>">次のページ→</a>
          <?php } ?>            
        </td>
    </tr>
</table>




