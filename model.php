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
	

//総登録数の確認
function COUNTS($db){
	$sth = $db -> query("SELECT * FROM address") or die('ERROR!2');
	$sth->execute();
	$dtcnt = $sth ->rowCount( );
	return $dtcnt;
}


//アドレス一覧の名前表示
function NAMEDATA($db,$st,$lim){
	$sth =$db->prepare("SELECT * FROM address ORDER by id desc LIMIT $st,$lim");
	$sth->execute();
	return $sth;
}


//アドレス一覧のアドレスid取得
function MAILDATA($db,$id){
	$sth =$db->prepare("SELECT * FROM mail_connect WHERE user_id = '$id'");
	$sth->execute();
         
        
        
        
        
        
            return $sth;
}


//アドレス一覧の表示
function MAILIDDATA($db,$mail_id){
        $sth4 =$db->prepare("SELECT * FROM user_mail WHERE id = '$mail_id'");
        $sth4->execute();
        
            return $sth4;
}


//アドレス一覧の電話番号表示
function TELDATA($db,$id){
	$sth =$db->prepare("SELECT * FROM tel_connect WHERE user_id = '$id'");
	$sth->execute();
         
            return $sth;
}


//アドレス一覧の表示
function TELIDDATA($db,$tel_id){
        $sth4 =$db->prepare("SELECT * FROM user_tel WHERE id = '$tel_id'");
        $sth4->execute();
        
            return $sth4;
}


//グループ表示
function GROUPDATA($db,$group_no){
	$sth2 =$db->prepare("SELECT * FROM user_group WHERE group_no = '$group_no' ");
        $sth2->execute();
	return $sth2;
}

//グループの選択部分表示
function SELECTGROUP($db){
	$sth =$db->prepare("SELECT * FROM user_group");
        $sth->execute();
	return $sth;
}

//アドレス検索結果表示
function SEARCH($db,$select,$search_word,$st,$lim){
	$sth =$db->prepare("SELECT * FROM address WHERE $select = '$search_word' LIMIT $st,$lim");
	$sth->execute();
	return $sth;
}


//idの取得
function SEARCHID($db){
	$sth =$db->prepare("SELECT * FROM address ORDER by id desc ");
	$sth->execute();
        $row =$sth->fetch(PDO::FETCH_ASSOC);
        $id = $row['id'];
        
        $searchid = $id + 1 ;
        
	return $searchid;
}


//アドレスの登録
function INSERTADDRESS($db,$id,$sei_k,$mei_k,$sei_f,$mei_f,$group_no){
try{
	$sth =$db->prepare("INSERT INTO address (id,sei_k,mei_k,sei_f,mei_f,group_no) VALUES( ?,?,?,?,?,?)");
	$sth->execute(array($id,$sei_k,$mei_k,$sei_f,$mei_f,$group_no));         
}
catch(PDOException $e){
	die('Insert failed: '.$e->getMessage());
}
        return $sth;
}

//アドレスの登録
function INSERTMAIL($db,$mail,$id){
        $sth =$db->prepare("INSERT INTO user_mail (mail) VALUES(?)");
        $sth->execute(array($mail));
            
            $sth2 =$db->prepare("SELECT * FROM user_mail WHERE mail = '$mail'");
            $sth2->execute();
            $row =$sth2->fetch(PDO::FETCH_ASSOC);
            $mail_connect_id=$row['id'];
                
                $sth3 =$db->prepare("INSERT INTO mail_connect (user_id ,mail_id) VALUES(?,?)");
                $sth3->execute(array($id , $mail_connect_id));
        
        return $sth3;
}


//電話番号の登録
function INSERTTEL($db,$tel,$id){
        $sth =$db->prepare("INSERT INTO user_tel (tel) VALUES(?)");
        $sth->execute(array($tel));
            
            $sth2 =$db->prepare("SELECT * FROM user_tel WHERE tel = '$tel'");
            $sth2->execute();
            $row =$sth2->fetch(PDO::FETCH_ASSOC);
            $tel_connect_id=$row['id'];
                
                $sth3 =$db->prepare("INSERT INTO tel_connect (user_id ,tel_id) VALUES(?,?)");
                $sth3->execute(array($id , $tel_connect_id));
                
        return $sth3;
}                                
                                

//idの確認
function IDCHECK($db,$no){
	//ユーザー情報の確認
	$sth = $db -> prepare ("SELECT * FROM address WHERE  id = '$no' ") or die('ERROR!2');
		$sth->execute();
		$cnt =$sth ->rowCount();
		if($cnt == 0){ 			
			$shingup =True;
		}
		else{
			$error_msg ='この番号は既に登録されています。';
			$singup =False;
		}
	return $shingup;
}



//情報の変更
function CHANGEADDRESS($db,$id_s,$id_c_s,$sei_k_c_s,$mei_k_c_s,$sei_f_c_s,$mei_f_c_s,$group_no_c_s){
try{
       	$sth =$db->prepare("UPDATE address SET id = :c_id, sei_k =:sei_k, mei_k = :mei_k, sei_f = :sei_f, mei_f = :mei_f, group_no = :group_no WHERE id = :id");
        $sth->bindValue(':c_id',$id_c_s);
	$sth->bindValue(':sei_k',$sei_k_c_s);
        $sth->bindValue(':mei_k',$mei_k_c_s);
        $sth->bindValue(':sei_f',$sei_f_c_s);
        $sth->bindValue(':mei_f',$mei_f_c_s);
        $sth->bindValue(':group_no',$group_no_c_s);
        $sth->bindValue(':id',$id_s);
        $sth->execute();
	}
catch(PDOException $e){
	die('Delete failed:'.$e->getMessage());
	}
	return $sth;
}




function CHANGEBBS($db,$change_id_s,$change_comment_s,$change_user_id_s){
try{
       	$sth =$db->prepare("UPDATE comments SET comment= :comment , user_id= :user_id WHERE id = :id");
        $sth->bindValue(':comment',$change_comment_s);
	$sth->bindValue(':user_id',$change_user_id_s);
        $sth->bindValue(':id',$change_id_s);
        $sth->execute();
	}
catch(PDOException $e){
	die('Delete failed:'.$e->getMessage());
	}
	return $sth;
    
}


//アドレスの更新
function SEARCHMAILID($db,$id_s){
        $sth =$db->prepare("SELECT * FROM mail_connect WHERE user_id = '$id_s'");
        $sth->execute();
        
        return $sth;
}


function SEARCHMAIL($db,$mail_id){
        $sth2 =$db->prepare("SELECT * FROM user_mail WHERE id = '$mail_id'");
        $sth2->execute();    
        
        return $sth2;
}


function CHANGEMAIL($db,$change_id,$mail_c_s,$mail_s){
        $sth3 =$db->prepare("UPDATE user_mail SET mail =:c_mail WHERE id = :id");
//        $sth3->bindValue(':c_id',NULL);
        $sth3->bindValue(':c_mail',$mail_c_s);
        $sth3->bindValue(':id',$change_id);
        $sth3->execute();

        return $sth3;
}



//電話番号の更新
function SEARCHTELID($db,$id_s){
        $sth4 =$db->prepare("SELECT * FROM tel_connect WHERE user_id = '$id_s'");
        $sth4->execute();
        
        return $sth4;
}


function SEARCHTEL($db,$mail_id){
        $sth5 =$db->prepare("SELECT * FROM user_tel WHERE id = '$tel_id'");
        $sth5->execute();    
        
        return $sth5;
}


function CHANGETEL($db,$change_id,$tel_c_s,$tel_s){
        $sth6 =$db->prepare("UPDATE user_tel SET tel =:c_tel WHERE id = :id");
        $sth6->bindValue(':c_tel',$tel_c_s);
        $sth6->bindValue(':id',$change_id);
        $sth6->execute();

        return $sth6;
}



//アドレス帳の削除
function DELETEADDRESS($db,$id){
    try{
        $sth =$db->prepare("DELETE FROM address WHERE id = $id");
        $sth->execute();	
    }
    catch(PDOException $e){
        die('Delete failed:'.$e->getMessage());
    }
        return $sth;
    }

    
//アドレスの削除
function DELETEMAIL($db,$id){    
    $sth = $db -> prepare ("SELECT * FROM mail_connect WHERE  user_id = '$id' ") or die('ERROR!2');
    $sth->execute();
    while($row =$sth->fetch(PDO::FETCH_ASSOC)){
        $mail_id=$row['mail_id'];
        
        $sth2 =$db->prepare("DELETE FROM user_mail WHERE id = $mail_id");
        $sth2->execute();
    }
    $sth3 =$db->prepare("DELETE FROM mail_connect WHERE id = $id");
    $sth3->execute();
            
    return $sth3;
}


//電話番号の削除
function DELETETEL($db,$id){    
    $sth = $db -> prepare ("SELECT * FROM tel_connect WHERE  user_id = '$id' ") or die('ERROR!2');
    $sth->execute();
    while($row =$sth->fetch(PDO::FETCH_ASSOC)){
        $tel_id=$row['tel_id'];
        
        $sth2 =$db->prepare("DELETE FROM user_tel WHERE id = $tel_id");
        $sth2->execute();
    }
    $sth3 =$db->prepare("DELETE FROM tel_connect WHERE id = $id");
    $sth3->execute();
            
    return $sth3;
}




?>
