<?php
 session_start();

if($_SESSION['auth'] == 'yes_auth'){
    
    include('db/db.php');
    include('function/functions.php');

    include('include/link_top.php');
    include('include/header.php');
    include('include/favourites-content.php');
    include('include/link_botton.php');

}else{

    header('Location: index.php');
    
}
?>