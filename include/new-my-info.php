<div class="block-prof col-md-offset-1 col-md-11">
	<p class="my-prof col-md-12">Мой профиль</p>

<?php
$result = mysql_query("SELECT * FROM user WHERE user_id = '{$_SESSION['auth_id']}'",$link);
	If (mysql_num_rows($result) > 0){

		$row = mysql_fetch_array($result);    

do{


?>
<div class="col-md-12">

<form id="upload" method="post" action="../include/upload.php" enctype="multipart/form-data">
			<div id="drop">
				перетащите изображение

					<div class="my-photo col-md-12" style="background: url(user_photo/<?php echo $row['user_photo'] ?>)no-repeat;background-size:100% 100%;"></div>
				<a>Загрузить</a>
				<input type="file" name="upl" multiple />
			</div>

			<ul>

			</ul>

		</form>

</div>	
<form class="new-form col-md-10" method="post">
	
		<p class="my-fio col-md-offset-1 col-md-10" ><strong><input id="my-fio" type="text" name="naw_fio" value="<?php echo $row['user_fio'] ?>"/></strong></p>
		<p class="my-email col-md-offset-1 col-md-8"><strong>email:</strong><input id="my-email" type="text" name="naw_email" value="<?php echo$row['user_email'] ?>"/></p>
		<p class="my-email col-md-offset-1 col-md-8"><strong>Номер телефона:</strong><input id="my-number" type="text" name="naw_number" value="<?php echo $row['user_number'] ?>"/></p>
		<p class="my-email col-md-offset-1 col-md-8"><strong>Адресс:</strong><input id="my-addres" type="text" name="naw_addres" value="<?php echo $row['user_addres'] ?>"/></p>
		<p class="my-email col-md-8" ><strong>Пароль:</strong><input id="my-pass" type="password" name="naw_pass"/></p>
		<p class="my-email col-md-8" ><strong>Новый пароль:</strong><input id="my-pass2" type="password" name="naw_pass2"/><br>"не обязательно"</p>

		<p class="naw-info col-md-12">Сохранить</p>
	</form>		

<?php } while ($row = mysql_fetch_array($result)); } ?>

</div>	