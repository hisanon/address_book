<?php

echo $action;

session_start();
require_once 'model.php';

$action=$_POST['action'];

switch($action){
    //ログイン
    case "login":
        require_once 'logn.php';

    break;

    
    //アドレス検索
    case "search":
        $sarch=$_POST['secrch'];
        
        require_once 'view_search.php';
        
    break;


    //名前登録
    case "s_name":
        $no=$_POST['no'];
        $sei_k=$_POST['sei_k'];
        $sei_f=$_POST['sei_f'];
        $mei_k=$_POST['mei_k'];
        $mei_f=$_POST['mei_f'];
        $group=$_POST['group'];
        $group_no=$_POST['group_no'];
        
        if(empty($sei_k
                //or $sei_f or $mei_k or $mei_f
                )){
            $erro_msg = 'どれかひとつ名前を入力して下さい';
        require_once 'view_singup_name.php';
        }
        else{
            require_once 'view_confirm_name.php';
        }

        
        
    break;


    //名前確認
    case "c_name":
        $mail_count=$_POST['mail_counto'];
        $tel_count=$_POST['tel_count'];
        $count_no= 1;
        
        $_SESSION['sei_k']=$sei_k;
        $_SESSION['sei_f']=$sei_f;
        $_SESSION['mei_k']=$mei_k;
        $_SESSION['mei_f']=$mei_f;
        $_SESSION['no']=$no;
        $_SESSION['group']=$group;
        $_SESSION['group_no']=$group_no;

        require_once 'view_singup_mail.php';
        
    break;


    //アドレス登録
    case "s_mail":
        
        $mail_count=$_POST['mail_counto'];
        $tel_count=$_POST['tel_count'];
        $count_no= 1;

        
        $mail=$_POST['mail'];
        $tel=$_POST['tel'];
        
        require_once 'view_singup_mail.php';
        
    break;


    //アドレス確認
    case "c_mail":
        $_SESSION['mail']=$mail;
        $_SESSION['tel']=$tel;
        
        require_once 'view_complete.php';
        
    break;


    //全登録完了
    case "complete":
        if(isset ($_POST['submit']) && $_POST['submit'] == '戻る'){
            require_once 'view_singup_mail.php';
        }
        elseif(isset ($_POST['submit']) && $_POST['submit'] == '登録'){
            $mail_s=$_SESSION['mail'];
            $tel_s=$_SESSION['tel'];
            $sei_k_s =$_SESSION['sei_k'];
            $sei_f_s =$_SESSION['sei_f'];
            $mei_k_s =$_SESSION['mei_k'];
            $mei_f_s =$_SESSION['mei_f'];
            $no_s =$_SESSION['no'];
            $group_no_s =$_SESSION['group_no'];

        
        
        
        
        
            unset($_SESSION['no']);
            unset($_SESSION['sei_k']);
            unset($_SESSION['sei_f']);
            unset($_SESSION['mei_k']);
            unset($_SESSION['mei_f']);
            unset($_SESSION['mail']);
            unset($_SESSION['tel']);
            unset($_SESSION['group']);
            unset($_SESSION['grpup_no']);
        
        require_once 'view_complete.php';
        }
    break;


    //ログアウト
    case "logout":
        require_once 'view_logout.php';
        
    break;


        //アドレス一覧
    default:
        require_once 'heder.php';
        require_once 'view_address.php';
        
    break;
    
}







?>


