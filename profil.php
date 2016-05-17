<?php
 session_start();

if($_SESSION['auth'] == 'yes_auth'){
	
	include('db/db.php');
    include('function/functions.php');
    include('validate/auth_cookie.php');

    include('include/link_top.php');
    include('include/header.php');
    include('include/profil-content.php');
    include('include/link_botton.php');

}else{

	header('Location: index.php');
	
}
?>