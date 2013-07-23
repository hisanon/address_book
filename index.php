<?php
session_start();
echo $action;

require_once 'model.php';

$action=$_POST['action'];

echo $action;

switch($action){
    //ログイン
    case "login":
        require_once 'logn.php';

    break;

    
    //アドレス検索
    case "search":
        $search_word=$_POST['search_word'];
        $search_item=$_POST['search_item'];
        
        echo $search_word.'/'.$search_item;
        
        switch($search_item){
            //no検索
            case "1":
                    $select= id;
                    $sth = SEARCH($db,$select,$search_word,$st,$lim);
                break;
            
            //名字検索(漢字)
            case "2":
                    $select=sei_k;
                    $sth = SEARCH($db,$select,$search_word,$st,$lim);
                break;
            
            //名字検索(カナ)
            case "3":
                    $select=sei_f;
                    $sth = SEARCH($db,$select,$search_word,$st,$lim);
                break;
            
            //名前検索(漢字)
            case "4":
                    $select=mei_k;
                    $sth = SEARCH($db,$select,$search_word,$st,$lim);
                break;
            
            //名前検索(カナ)
            case "5":
                    $select=mei_f;
                    $sth = SEARCH($db,$select,$search_word,$st,$lim);
                break;
                        
            default:
                    $sth= NAMEDATA($db,$st,$lim);
                break;
        }
        
        require_once 'view_search.php';
    break;


    //名前登録
    case "s_name":
        $no=$_POST['no'];
        $sei_k=$_POST['sei_k'];
        $sei_f=$_POST['sei_f'];
        $mei_k=$_POST['mei_k'];
        $mei_f=$_POST['mei_f'];
        $group_no=$_POST['group_no'];
                
        $shingup=IDCHECK($db,$no);
        
        if($shingup == False){
            $error_msg ='この番号は既に登録されています。';
            require_once 'view_singup_name.php';
        }
        else{
            if(empty($sei_k)){
                $erro_msg = '名前を入力して下さい';
                require_once 'view_singup_name.php';
            }
            else{
                $sth2 = GROUPDATA($db,$group_no);
                $row =$sth2->fetch(PDO::FETCH_ASSOC);
                $group_name =$row['group_name'];
            
                $_SESSION['sei_k']=$sei_k;
                $_SESSION['sei_f']=$sei_f;
                $_SESSION['mei_k']=$mei_k;
                $_SESSION['mei_f']=$mei_f;
                $_SESSION['no']=$no;
                $_SESSION['group_no']=$group_no;
                $_SESSION['group_name']=$group_name;

                require_once 'view_confirm_name.php';
            }
        }
    break;


    //名前確認
    case "c_name":
        $submit=$_POST['submit'];
        if(isset($_POST['submit']) && $_POST['submit']=='戻る'){
            require_once 'view_singup_name.php';
        }
        elseif(isset($_POST['submit']) && $_POST['submit']=='確認'){
            $mail=$_POST['mail'];
            $tel=$_POST['tel'];
            if(!empty($mail)){
                $_SESSION['mail']=$mail;
                $_SESSION['tel']=$tel;
                require_once 'view_confirm_mail.php';
            }
            else{
                require_once 'view_singup_name.php';
            }
        }
        else{
                require_once 'view_confirm_name.php';            
        }
    break;
    

    //全登録完了
    case "complete":
        if(isset ($_POST['submit']) && $_POST['submit'] == '戻る'){
            require_once 'view_singup_name.php';
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
            $group_name_s =$_SESSION['group_name'];
        
            $sth=INSERTADDRESS($db,$no_s,$sei_k_s,$mei_k_s,$sei_f_s,$mei_f_s,$group_no_s);
            //$sth3= INSERTMAIL($mail_S,$no_s);
            //$sth3= INSERTTEL($tel_S,$no_s);
        
            unset($_SESSION['no']);
            unset($_SESSION['sei_k']);
            unset($_SESSION['sei_f']);
            unset($_SESSION['mei_k']);
            unset($_SESSION['mei_f']);
            unset($_SESSION['mail']);
            unset($_SESSION['tel']);
            unset($_SESSION['group_name']);
            unset($_SESSION['grpup_no']);
        
        require_once 'view_complete.php';
        }
    break;


    //ログアウト
    case "logout":
        require_once 'view_logout.php';
        
    break;


    //変更画面
    case "change":
        $change_id=$_POST['change_id'];
        $select =id;
        $sth=SEARCH($db,$select,$change_id,$st,$lim);
        
        $row =$sth->fetch(PDO::FETCH_ASSOC);
                
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
        
        require_once 'view_change.php';
        
    break;


    //確認画面
    case "change":

        
    break;

        
    //アドレス一覧
    default:
        $sth= NAMEDATA($db,$st,$lim);
        require_once 'heder.php';
        require_once 'view_address.php';
        
    break;
    
}







?>


