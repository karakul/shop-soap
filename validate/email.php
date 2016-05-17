<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{   

 include('../db/db.php');
include("../functions/functions.php");

$email = clear_string($_POST['email']);

$result = mysql_query("SELECT * FROM user WHERE user_email = '$email'",$link);
If (mysql_num_rows($result) > 0)
{
   echo 'false';
}
else
{
   echo 'true'; 
}
}
?>