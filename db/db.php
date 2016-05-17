<?php 

$host='localhost';
$user='root';
$pass='';
$db='soap';

$link=mysql_connect($host, $user, $pass);

mysql_select_db($db, $link)or die("no connect data base".mysql_error());
mysql_query("SET names utf-8");
 ?>