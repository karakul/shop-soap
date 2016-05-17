<?php 
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();

    include('../db/db.php');
    include('../function/functions.php');
        
    $naw_fio = clear_string($_POST["naw_fio"]);
    $naw_email = clear_string($_POST["naw_email"]);
    $naw_number = clear_string($_POST["naw_number"]);
    $naw_addres = clear_string($_POST["naw_addres"]);
    $naw_pass = clear_string($_POST["naw_pass"]);
    $naw_pass2 = clear_string($_POST["naw_pass2"]);
    $upload_image = clear_string($_POST["upload_image"]);
 
    $error = array();
    
    $pass   = md5($naw_pass);
    $pass   = strrev($pass);
    $pass   = "Dfytr07071987".$pass."Rjczr07071987";

    

    if($_SESSION['auth_pass'] != $pass){

        $error[]='Не верный пароль!';

    }else{
        
      if($naw_pass2 != ""){

         if(strlen($naw_pass2) < 7 || strlen($naw_pass2) > 20){

            $error[]='Пароль должен быть от 7 до 20 символов!';

        }else{
                     $newpass   = md5(clear_string($naw_pass2));
                     $newpass   = strrev($newpass);
                     $newpass   = "Dfytr07071987".$newpass."Rjczr07071987";
                     $newpassquery = "user_pas='$newpass',";
        }
    }
    
    
    
        if(strlen($naw_fio) < 5 || strlen($naw_fio) > 40){

        $error[]='ФИО должно содержать от 5 до 40 символов!';
    }
    

        if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($naw_email))){

        $error[]='Введите коректнный email!';
    }
    
      if(strlen($naw_number) == ""){

        $error[]='Введите свой телефон!';
    } 
    
      if(strlen($naw_addres) == ""){

        $error[]='Введите свой адрес!';
    }      
     

    }
    
  if(count($error)){

    $error = implode('<br />',$error);

    echo $error;

    }else{

           
     $dataquery = $newpassquery."user_fio='$naw_fio',user_email='$naw_email',user_number='$naw_number',user_addres='$naw_addres'"; 

     $update = mysql_query("UPDATE user SET $dataquery WHERE user_id = '{$_SESSION['auth_id']}'",$link);
      
    if ($newpass){ $_SESSION['auth_pass'] = $newpass; } 
    
    

    $_SESSION['auth_fio'] = $new_fio;
    $_SESSION['auth_address'] = $new_addres;
    $_SESSION['auth_number'] = $new_number;
    $_SESSION['auth_email'] = $new_email;
  
  echo 'true';

    }
       
    }
 ?>