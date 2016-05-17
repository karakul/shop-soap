<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
include("../db/db.php");
include("../function/functions.php");

$email = clear_string($_POST["email"]);

if ($email != ""){
    
  $result = mysql_query("SELECT user_email FROM user WHERE user_email='$email'",$link);
    If (mysql_num_rows($result) > 0){
    
//генерация нового пароля
    $newpass = fungenpass();
    

    $pass   = md5($newpass);
    $pass   = strrev($pass);
    $pass   = "Dfytr07071987".$pass."Rjczr07071987";  

 

$update = mysql_query ("UPDATE user SET user_pas='$pass' WHERE user_email='$email'",$link);

  
   
	         send_mail( 'pk070787@yandex.ru',
			             $email,
						'Новый пароль для сайта мыло ручной работы',
						'Ваш новый пароль: '.$newpass);   
   
   echo 'yes';
    
}else
{
    echo 'Данный E-mail не найден!';
}

}else{

    echo 'Поле E-mail пустое';
}

}



?>