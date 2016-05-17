<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{

	include('../db/db.php');
    include('../function/functions.php');
    
    $email = clear_string($_POST["email"]);
    
    $pass   = md5(clear_string($_POST["pass"]));
    $pass   = strrev($pass);
    $pass   = strtolower("Dfytr07071987".$pass."Rjczr07071987"); 
    

    
    if ($_POST["rememberme"] == "yes")
    {

            setcookie('rememberme',$email.'+'.$pass,time()+3600*24*31, "/");

    }
    
       
   $result = mysql_query("SELECT * FROM user WHERE user_email = '$email' AND user_pas = '$pass'",$link);
if (mysql_num_rows($result) > 0)
{
    $row = mysql_fetch_array($result);
    session_start();
    $_SESSION['auth'] = 'yes_auth'; 
    $_SESSION['auth_pass'] = $row["user_pas"];
    $_SESSION['auth_fio'] = $row["user_fio"];
    $_SESSION['auth_address'] = $row["user_addres"];
    $_SESSION['auth_number'] = $row["user_number"];
    $_SESSION['auth_email'] = $row["user_email"];
    $_SESSION['auth_id'] = $row["user_id"];
    $_SESSION['auth_photo'] = $row["user_photo"];
    
    echo 'true';

}else{
    echo"false";
} 
} 

?>