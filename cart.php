<?php 
    session_start();
    include('db/db.php');
    include('function/functions.php');
   	include('validate/auth_cookie.php');
    include('validate/cart.php');
    include('include/link_top.php');
    include('include/header.php');
    include('include/registration.php');
    include('include/login.php');
    include('include/cart-content.php');
    include('include/link_botton.php');
 ?>