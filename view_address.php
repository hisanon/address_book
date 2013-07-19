<!---アドレス一覧の表示--->

<?php
$sth= ALLDATA($db,$st,$lim);
while($row =$sth->fetch(PDO::FETCH_ASSOC)){
    
            
    $id = $row['id'];
    $sei_k = $row['sei_k'];
    $mei_k = $row['mei_k'];
    $sei_f =$row['sei_f'];
    $mei_f =$row['mei_f'];
    $mail =$row['mail'];
    $tel =$row['tel'];
    $group_no =$row['group_no'];
    
    $sth2= GROUPDATA($db,$group_no);
    $row =$sth2->fetch(PDO::FETCH_ASSOC);
	
    $group_name =$row['group_name'];
    
?>

<table border="1" cellspacing="0" cellpadding="5">
    <tr style="background:#99CCFF">
        <td width="35" align="center">登録NO</td>
        <td width="130">名前(姓)</td>
        <td width="130">名前(名)</td>
        <td width="280">メールアドレス</td>
        <td width="180">電話番号</td>
        <td width="145">グループ</td>
        <td width="60" align="center">編集</td>
    </tr>
    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $sei_k.'('.$sei_f.')'; ?></td>
        <td><?php echo $mei_k.'('.$mei_f.')'; ?></td>
        <td><?php echo $mail; ?></td>
        <td><?php echo $tel; ?></td>
        <td><?php echo $group_name; ?></td>
        <td>編集</td>
    </tr>
</table>
<?php } ?>