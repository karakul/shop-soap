<?php 
     $id = clear_string($_GET["id"]);
     $action = clear_string($_GET["action"]);
    
   switch ($action) {

        case 'clear':
        $clear = mysql_query("DELETE FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);     
        break;
        
        case 'delete':     
        $delete = mysql_query("DELETE FROM cart WHERE cart_id = '$id' AND cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);        
        break;
        
    }

    if (isset($_POST["submitdata"])){

if ( $_SESSION['auth'] != 'yes_auth'){
        
$_SESSION["order_delivery"] = $_POST["order_delivery"];
$_SESSION["order_fio"] = $_POST["order_fio"];
$_SESSION["order_email"] = $_POST["order_email"];
$_SESSION["order_phone"] = $_POST["order_phone"];
$_SESSION["order_address"] = $_POST["order_address"];
$_SESSION["order_note"] = $_POST["order_note"];

    mysql_query("INSERT INTO orders(order_datetime,order_dostavka,order_fio,order_address,order_phone,order_note,order_email)
                        VALUES( 
                             NOW(),
                            '".clear_string($_POST["order_delivery"])."',                   
                            '".clear_string($_POST["order_fio"])."',
                            '".clear_string($_POST["order_address"])."',
                            '".clear_string($_POST["order_phone"])."',
                            '".clear_string($_SESSION["order_note"])."',
                            '".clear_string($_POST["order_email"])."'                   
                            )",$link);    

 }

$_SESSION["order_id"] = mysql_insert_id();                          
                            
$result = mysql_query("SELECT * FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);
if (mysql_num_rows($result) > 0){

$row = mysql_fetch_array($result);    

do{

    mysql_query("INSERT INTO buy_products(buy_id_order,buy_id_product,buy_count_product)
                        VALUES( 
                            '".$_SESSION["order_id"]."',                    
                            '".$row["cart_id_products"]."',
                            '".$row["cart_count"]."'                   
                            )",$link);



} while ($row = mysql_fetch_array($result));
}
 

                       

}


 ?>