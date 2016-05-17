			<div class="block-prof col-md-offset-1 col-md-11">
				<p class="my-prof col-md-12">Мой профиль</p>
<?php
$result = mysql_query("SELECT * FROM `user` WHERE `user_id` = '{$_SESSION['auth_id']}'",$link);
	if (mysql_num_rows($result) > 0){

		$row = mysql_fetch_array($result);    

do{


?>
		<a href="#">
			<div class="my-photo col-md-3" style="background: url(user_photo/<?php echo $row['user_photo'] ?>)no-repeat;background-size:100% 100%;"></div>
		</a>
		<p class="my-fio col-md-offset-1 col-md-8"><strong><?php echo $row['user_fio'] ?></strong></p>
		<p class="my-email col-md-offset-1 col-md-8"><strong>email:</strong><?php echo $row['user_email'] ?></p>
		<p class="my-email col-md-offset-1 col-md-8"><strong>Номер телефона:</strong><?php echo $row['user_number'] ?></p>
		<p class="my-email col-md-offset-1 col-md-8"><strong>Адресс:</strong><?php echo $row['user_addres'] ?></p>
		<div class="info-product col-md-12">
			<div class="col-md-4">
				<p class="my-prof col-md-12">В корзине</p>
				<p class="info-strong info-cart col-md-12"></p>
			</div>
			<div class="col-md-4">
				<p class="my-prof col-md-12">В избраном</p>
				<p class="info-strong info-star col-md-12">1</p>
			</div>
			<div class="col-md-4">
				<p class="my-prof col-md-12">В обработке</p>
				<p class="info-strong info-obr col-md-12">1</p>
			</div>
		</div>



<?php } while ($row = mysql_fetch_array($result)); } ?>
				
			</div>	