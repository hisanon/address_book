<?php
require_once 'db.php';

$action='';
$action=$post['action'];


//取り出す最大レコード数
$lim =5;

//ページの位置取得
$p =intval(@$_GET["p"]);
if($p < 1){
$p =1;
}

//データの位置を取得する
$st =($p -1) * $lim;

//前ページ、次ページの番号の取得
$prev = $p -1;
if($prev<1){
    $prev=1;
}
$next = $p +1;
	




//アドレス一覧の表示
function ALLDATA($db,$st,$lim){
	$sth =$db->prepare("SELECT * FROM address ORDER by id desc LIMIT $st,$lim");
	$sth->execute();
	return $sth;
}

function GROUPDATA($db,$group_no){
	$sth2 =$db->prepare("SELECT * FROM user_group WHERE group_no = $group_no ");
        $sth2->execute();
	return $sth2;
}



?>
