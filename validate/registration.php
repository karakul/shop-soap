<?php

 if($_SERVER["REQUEST_METHOD"] == "POST")
{
  session_start();

     include('../db/db.php');
     include('../function/functions.php');
     $error = array();
         
        $fio = strtolower(clear_string($_POST['fio'])); 
        $pass = strtolower(clear_string($_POST['pass'])); 
        $pass2 = strtolower(clear_string($_POST['pass2'])); 
        $email = clear_string($_POST['email']); 
        $number = clear_string($_POST['number']); 
        $addres = clear_string($_POST['addres']);
 
 
    if (strlen($pass) == !strlen($pass2))
    {
       $error[] = "Пароли не совпадают!"; 
    }
   
     
    if (strlen($pass) < 6 or strlen($pass) > 20) $error[] = "Укажите пароль от 6 до 20 символов!";
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))){
        $error[] = "Укажите корректный email!";
    }else{   
        
     $result = mysql_query("SELECT * FROM user WHERE user_email = '$email'",$link);
    If (mysql_num_rows($result) > 0)
    {
       $error[] = "Email уже был использован!";
    }
            
    }
    if (!$number) $error[] = "Укажите номер телефона!";
    if (!$addres) $error[] = "Необходимо указать адрес доставки!";
     
   if (count($error))
   {
    
 echo implode('<br />',$error);
     
   }else
   {   
        $pass   = md5($pass);
        $pass   = strrev($pass);
        $pass   = "Dfytr07071987".$pass."Rjczr07071987";
        
        $ip = $_SERVER['REMOTE_ADDR'];
		
		mysql_query("INSERT INTO user(user_fio,user_pas,user_email,user_number,user_addres,user_data,user_ip) VALUES ('$fio','$pass','$email','$number','$addres',NOW(),'$ip')",$link);

 echo 'true';
 }        


}
?>