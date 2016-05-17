<?php
session_start();

	include('../db/db.php');
    include('../function/functions.php');

$id = $_SESSION['auth_id'];
$user_photo = $_SESSION['auth_photo'];

$error_img = array();
// A list of permitted file extensions

if(isset($_FILES['upl']) == 0){

	switch ($_FILES['upl']['error'])
 {
 case 1: $error_img[] =  'Размер файла превышает допустимое значение UPLOAD_MAX_FILE_SIZE'; break;
 case 2: $error_img[] =  'Размер файла превышает допустимое значение MAX_FILE_SIZE'; break;
 case 3: $error_img[] =  'Не удалось загрузить часть файла'; break;
 case 4: $error_img[] =  'Файл не был загружен'; break;
 case 6: $error_img[] =  'Отсутствует временная папка.'; break;
 case 7: $error_img[] =  'Не удалось записать файл на диск.'; break;
 case 8: $error_img[] =  'PHP-расширение остановило загрузку файла.'; break;
 }

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $error_img)){
		
		echo $error_img;

	}

}else{


if($_FILES['upl']['type'] == 'image/jpeg' || $_FILES['upl']['type'] == 'image/jpg' || $_FILES['upl']['type'] == 'image/png')
{ 

$imgext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['upl']['name']));


$uploaddir = '../user_photo/';



$newfilename = 'user-id-'.$id.'-'.rand(10,100).'.'.$imgext;

$uploadfile = $uploaddir.$newfilename;



if (move_uploaded_file($_FILES['upl']['tmp_name'], $uploadfile))
{

   $update = mysql_query("UPDATE user SET user_photo='$newfilename' WHERE  user_id = '$id'",$link);  

echo '{"status":"success"}';


}else{
 echo '{"status":"error"}';   


}
 
    
}else{
echo $error_img[] =  'Допустимые расширения: jpeg, jpg, png';
}
}



