<?php
 if ($_SESSION['auth'] != 'yes_auth' && $_COOKIE["rememberme"])
  {
    
  $str = $_COOKIE["rememberme"];
  

  $all_len = strlen($str);

  $login_len = strpos($str,'+'); 

  $login = clear_string(substr($str,0,$login_len));
  

  $pass = clear_string(substr($str,$login_len+1,$all_len));

  
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


  
  
  }
}
?>