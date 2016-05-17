   <?php   

if($_SERVER["REQUEST_METHOD"] == "POST"){   

    session_start();
   include('../db/db1.php');
   include('../function/functions.php');

   $error = array();

   $_SESSION["order_delivery"]=clear_string($_POST["order_delivery"]);

   if(strlen($_SESSION["order_delivery"]) == ""){

        $error[]='Выберете способ доставки';
    }      

   $_SESSION["order_note"]=clear_string($_POST['order_note']);

if(count($error)){

    $error = implode('<br />',$error);

    echo $error;

    }else{

    mysql_query("INSERT INTO orders(order_datetime,order_dostavka,order_fio,order_address,order_phone,order_note,order_email)
                        VALUES( 
                             NOW(),
                            '".$_SESSION["order_delivery"]."',                 
                            '".$_SESSION['auth_fio']."',
                            '".$_SESSION['auth_address']."',
                            '".$_SESSION['auth_number']."',
                            '".$_SESSION["order_note"]."',
                            '".$_SESSION['auth_email']."'                              
                            )",$link);    


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



   echo 'true';
}
 }

}
?>