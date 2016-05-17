<?php
    session_start();
    include('db/db.php');
    include('function/functions.php');
    include('validate/auth_cookie.php');
    
    include('include/link_top.php');
    echo'heloo world 1123312';
    include('include/header.php');
    include('include/menu.php');
    include('include/registration.php');
    include('include/login.php');
    include('include/index_content.php');
    include('include/link_botton.php');
?>