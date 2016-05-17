
<content>
    <div class="container">
        <div class="row">
            <div class="block-content col-md-12 col-sm-12 col-xs-12">
               <?php 
               		$action = clear_string($_GET['action']);

					switch ($action) {
						case 'oneclick':
				?>
								<div class="cart-top-panel col-md-12>">
									<div class="breadcrumbs col-md-12">
							            <a class="active nav-cr" href="cart.php?action=oneclick">Корзина товаров</a>
							            <a class="nav-cr" href="cart.php?action=confirm">Контактная информация</a>
							            <a class="nav-cr" href="cart.php?action=completion">Завершение</a>
							            <!--<a class="hvr-float-shadow clear-cart" href="cart.php?action=clear">Очистить все</a>-->
										<a class="clear-ccart" href="cart.php?action=clear">
								            <button class="btn btn-7 btn-7d btn-icon-only icon-remove">Пусто</button>
										</a>
							        </div>
							        
							    </div>    
								

				<?php					
								$result = mysql_query("SELECT * FROM cart,products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND products.products_id = cart.cart_id_products",$link);

								if (mysql_num_rows($result) > 0){

									$row = mysql_fetch_array($result);

				?>
									   
									   <div id="header-list-cart" class="text col-md-12">    
									   	<div id="head" class="col-md-2 text"><span>Изображение</span></div>
									   	<div id="head" class="col-md-4 text"><span>Наименование товара</span></div>
									   	<div id="head" class="col-md-2 text"><span>Кол-во</span></div>
									   	<div id="head" class="col-md-2 text"><span>Цена</span></div>
									   	<div id="head" class="col-md-2 text"><span>Удалить</span></div>
									   </div>

				<?php					   
								do{

									$int = $row["cart_price"] * $row["cart_count"];
									$all_price = $all_price + $int;

									if  (strlen($row["products_img"]) > 0 && file_exists("img/product/".$row["products_img"])){

										$img_path = 'img/product/'.$row["products_img"];
										$max_width = 100; 
										$max_height = 100; 
										 list($width, $height) = getimagesize($img_path); 
										$ratioh = $max_height/$height; 
										$ratiow = $max_width/$width; 
										$ratio = min($ratioh, $ratiow); 

										$width = intval($ratio*$width); 
										$height = intval($ratio*$height);    

									}else{

										$img_path = "img/noimages.jpeg";
										$width = 120;
										$height = 105;
									} 


				?>
									
									<div class="block-list-cart col-md-12">

										<div class="img-cart col-md-2">
											<p align="center"><img src="<?php echo $img_path ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" /></p>
										</div>

										<div class="title-cart col-md-4">
											<p class="cart-title"><a href=""><?php echo $row['products_name'] ?></a></p>
											<p class="cart-mini-features col-md-12"><?php echo $row['products_discription']?></p>
										</div>

										<div class="count-cart col-md-2">
											<ul class="input-count-style">

												<li>
													<p align="center" iid="" class="count-minus">-</p>
												</li>

												<li>
													<p align="center"><input id="input-id" iid="" class="count-input" maxlength="3" type="text" value="<?php echo $row['cart_count'] ?>" /></p>
												</li>

												<li>
													<p align="center" iid="" class="count-plus">+</p>
												</li>

											</ul>
										</div>

										<div id="" class="price-product col-md-2">
											<h5>
												<span class="span-count" ><?php echo $row['cart_count'] ?></span> 
												x 
												<span><?php echo $int ?></span>
											</h5>
											<p price="'.$row['products_price'].'" ><?php echo $row['products_price'] ?> руб</p>
										</div>
										<div class="delete-cart col-md-2">
											<div class="b-del">
												<a href="cart.php?id=<?php echo $row['cart_id'] ?>&action=delete" >
													<button class="button-prod-del btn btn-7 btn-7d btn-icon-only icon-remove">Пусто</button>
												</a>
											</div>
										</div>

									
									</div>
				<?php

							}while ($row = mysql_fetch_array($result));		    
								
				?>					 
									
									 <h2 class="itog-price" align="right">Итого: <strong><?php echo group_numerals($all_price) ?></strong> руб</h2>
									 <p align="right"  ><a href="cart.php?action=confirm" ><button id="bottom-cart-line" class="btn btn-7 btn-7a icon-truck">далее</button></a></p> 
									

						<?php }else{ ?>
									<h3 id="clear-cart" align="center">Корзина пуста</h3>
						<?php }		  
							

							break;

							case 'confirm':
							?>
								
								<div class="cart-top-panel col-md-12>">
									<div class="breadcrumbs col-md-12">
							            <a class="nav-cr" href="cart.php?action=oneclick">Корзина товаров</a>
							            <a class="active nav-cr" href="cart.php?action=confirm">Контактная информация</a>
							            <a class="nav-cr" href="cart.php?action=completion">Завершение</a>
							        </div>
							        
							    </div>      
				<?php

						if ($_SESSION['order_delivery'] == "По почте") $chck1 = "checked";
						if ($_SESSION['order_delivery'] == "Курьерам") $chck2 = "checked";
						if ($_SESSION['order_delivery'] == "Самовывоз") $chck3 = "checked"; 
								 
							echo'
								
								<h3 class="title-h3 col-md-10 col-md-offset-2" >Способы доставки:</h3>
								<form method="post"class="col-md-10 col-md-offset-2">
									<ul id="info-radio">
										<li>
										<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery1" value="По почте" '.$chck1.'  />
										<label class="label_delivery" for="order_delivery1"><p>По почте</p></label>
										</li>
										<li>
										<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery2" value="Курьерам"  '.$chck2.'  />
										<label class="label_delivery" for="order_delivery2"><p>Курьерам</p></label>
										</li>
										<li>
										<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery3" value="Самовывоз" '.$chck3.'   />
										<label class="label_delivery" for="order_delivery3"><p>Самовывоз</p></label>
										</li>
										</ul>
										<h3 class="title-h3" >Информация для доставки:</h3>
										<ul id="info-order">
									';
										  if ( $_SESSION['auth'] != 'yes_auth' ) 
										{
				?>
										
										<li class="col-md-12">
											<label for="order_fio"><span>*</span>ФИО</label>
											<input type="text" name="order_fio" id="order_fio" value="<?php echo $_SESSION["order_fio"] ?>"/>
											<span class="order_span_style" >Пример: Иванов Иван Иванович</span>
										</li>

										<li class="col-md-12">
											<label for="order_email">
											<span>*</span>E-mail</label>
											<input type="text" name="order_email" id="order_email" value="<?php echo $_SESSION["order_email"] ?>" />
											<span class="order_span_style" >Пример: ivanov@mail.ru</span>
										</li>

										<li class="col-md-12">
											<label for="order_phone"><span>*</span>Телефон</label>
											<input type="text" name="order_phone" id="order_phone" value="<?php echo $_SESSION["order_phone"] ?>" />
											<span class="order_span_style" >Пример: 8 950 100 12 34</span>
										</li>

										<li class="col-md-12">
											<label class="order_label_style" for="order_address"><span>*</span>Адрес<br /> доставки</label>
											<input type="text" name="order_address" id="order_address" value="<?php echo $_SESSION["order_address"] ?>" />
											<span>Пример: г. Москва,<br /> ул Интузиастов д 18, кв 58</span>
										</li>
				<?php } ?>
										
										<li class="col-md-12">
											<label class="order_label_style order_note col-md-2" for="order_note"><p>Примечание</p></label>
											<textarea class="col-md-4" name="order_note" class="order_note"  ><?php echo $_SESSION["order_note"] ?></textarea>
											<span class="col-md-4">Уточните информацию о заказе.<br />  Например, удобное время для звонка<br />  нашего менеджера</span>
										</li>

									</ul>
				<?php if($_SESSION['auth'] == 'yes_auth'){ ?>

									<p align="right" class="col-md-10" ><button id="bottom-cart-line" class="confirm-button-next-yes-auch btn btn-7 btn-7a icon-truck">далее</button></p> 

				<?php }else{ ?>
									<p align="right" class="col-md-10" ><button type="submit" name="submitdata" id="bottom-cart-line" class="confirm-button-next btn btn-7 btn-7a icon-truck">далее</button></p> 
				<?php } ?>
								</form>


				<?php      
      
							break;

							case 'completion':
				?>
								<div class="cart-top-panel col-md-12 col-sm-12 col-xs-12">
									<div class="breadcrumbs col-md-12 col-sm-12 col-xs-12">
							            <a class="nav-cr" href="cart.php?action=oneclick">Корзина товаров</a>
							            <a class="nav-cr" href="cart.php?action=confirm">Контактная информация</a>
							            <a class="active nav-cr" href="cart.php?action=completion">Завершение</a>
							        </div>
							        
							    </div>   

							    	
				<?php if ( $_SESSION['auth'] == 'yes_auth' ){ ?>

								<div  class="cart-itog col-md-8 col-md-offset-2">
									<h3>Конечная информация:</h3>  
									<ul id="list-info" class="col-md-12 col-sm-12 col-xs-12">

										<li class="col-md-6 col-sm-6 col-xs-6"><strong>Способ доставки:</strong></li>
										<li class="col-md-6 col-sm-6 col-xs-6"><p><?php echo $_SESSION['order_delivery'] ?></p></li>

										<li class="col-md-6 col-sm-6 col-xs-6"><strong>Email:</strong></li>
										<li class="col-md-6 col-sm-6 col-xs-6"><p><?php echo $_SESSION['auth_email'] ?></p></li>

										<li class="col-md-6 col-sm-6 col-xs-6"><strong>ФИО:</strong></li>
										<li class="col-md-6 col-sm-6 col-xs-6"><p><?php echo $_SESSION['auth_fio'] ?></p></li>


										<li class="col-md-6 col-sm-6 col-xs-6"><strong>Адрес доставки:</strong></li>
										<li class="col-md-6 col-sm-6 col-xs-6"><p><?php echo $_SESSION['auth_address'] ?></p></li>

										<li class="col-md-6 col-sm-6 col-xs-6"><strong>Телефон:</strong></li>
										<li class="col-md-6 col-sm-6 col-xs-6"><p><?php echo $_SESSION['auth_number'] ?></p></li>

										<li class="col-md-6 col-sm-6 col-xs-6"><strong>Примечание: </strong></li>
										<li class="col-md-6 col-sm-6 col-xs-6"><p><?php echo $_SESSION['order_note'] ?></p></li>

									</ul>
								</div>

				<?php }else{ ?>

								<div  class="cart-itog col-md-8 col-md-offset-2">
									<h3>Конечная информация:</h3>  
									<ul id="list-info" class="col-md-12 col-sm-12 col-xs-12">

										<li class="col-md-6 col-sm-6 col-xs-6"><strong>Способ доставки:</strong></li>
										<li class="col-md-6 col-sm-6 col-xs-6"><p><?php echo $_SESSION['order_delivery'] ?></p></li>

										<li class="col-md-6 col-sm-6 col-xs-6"><strong>Email:</strong></li>
										<li class="col-md-6 col-sm-6 col-xs-6"><p><?php echo $_SESSION['order_email'] ?></p></li>

										<li class="col-md-6 col-sm-6 col-xs-6"><strong>ФИО:</strong></li>
										<li class="col-md-6 col-sm-6 col-xs-6"><p><?php echo $_SESSION['order_fio'] ?></p></li>


										<li class="col-md-6 col-sm-6 col-xs-6"><strong>Адрес доставки:</strong></li>
										<li class="col-md-6 col-sm-6 col-xs-6"><p><?php echo $_SESSION['order_address'] ?></p></li>

										<li class="col-md-6 col-sm-6 col-xs-6"><strong>Телефон:</strong></li>
										<li class="col-md-6 col-sm-6 col-xs-6"><p><?php echo $_SESSION['order_phone'] ?></p></li>

										<li class="col-md-6 col-sm-6 col-xs-6"><strong>Примечание: </strong></li>
										<li class="col-md-6 col-sm-6 col-xs-6"><p><?php echo $_SESSION['order_note'] ?></p></li>

									</ul>
								</div>
				<?php  
								}

								$result = mysql_query("SELECT * FROM cart,products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND products.products_id = cart.cart_id_products",$link);
								if (mysql_num_rows($result) > 0){

								$row = mysql_fetch_array($result);

								do{ 

								$int = $int + ($row["products_price"] * $row["cart_count"]);

								}while ($row = mysql_fetch_array($result));
								 

								   $itogpricecart = $int;
								}

				?>
								 <div  class="col-md-10">
									<h2 class="itog-price" align="right">Итого: <strong><?php echo group_numerals($itogpricecart) ?></strong> руб</h2>
								  	<p align="right"  >
								  		<a href="cart.php?action=confirm" >
								  			<button type="submit" name="submitdata" id="bottom-cart-line" class="btn btn-7 btn-7a icon-truck">
								  				Оплатить
								  			</button>	
								  		</a>
								  	</p> 
								</div>
				<?php
							break;
						
						default:
				?>
								<div class="cart-top-panel col-md-12>">
									<div class="breadcrumbs col-md-12">
							            <a class="active nav-cr" href="cart.php?action=oneclick">Корзина товаров</a>
							            <a class="nav-cr" href="cart.php?action=confirm">Контактная информация</a>
							            <a class="nav-cr" href="cart.php?action=completion">Завершение</a>
							            <!--<a class="hvr-float-shadow clear-cart" href="cart.php?action=clear">Очистить все</a>-->
										<a class="clear-ccart" href="cart.php?action=clear">
								            <button class="btn btn-7 btn-7d btn-icon-only icon-remove">Пусто</button>
										</a>
							        </div>
							        
							    </div>    
								

				<?php					
								$result = mysql_query("SELECT * FROM cart,products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND products.products_id = cart.cart_id_products",$link);

								if (mysql_num_rows($result) > 0){

									$row = mysql_fetch_array($result);

				?>
									   
									   <div id="header-list-cart" class="text col-md-12">    
									   	<div id="head" class="col-md-2 text"><span>Изображение</span></div>
									   	<div id="head" class="col-md-4 text"><span>Наименование товара</span></div>
									   	<div id="head" class="col-md-2 text"><span>Кол-во</span></div>
									   	<div id="head" class="col-md-2 text"><span>Цена</span></div>
									   	<div id="head" class="col-md-2 text"><span>Удалить</span></div>
									   </div>

				<?php					   
								do{

									$int = $row["cart_price"] * $row["cart_count"];
									$all_price = $all_price + $int;

									if  (strlen($row["products_img"]) > 0 && file_exists("img/product/".$row["products_img"])){

										$img_path = 'img/product/'.$row["products_img"];
										$max_width = 100; 
										$max_height = 100; 
										 list($width, $height) = getimagesize($img_path); 
										$ratioh = $max_height/$height; 
										$ratiow = $max_width/$width; 
										$ratio = min($ratioh, $ratiow); 

										$width = intval($ratio*$width); 
										$height = intval($ratio*$height);    

									}else{

										$img_path = "img/noimages.jpeg";
										$width = 120;
										$height = 105;
									} 


				?>
									
									<div class="block-list-cart col-md-12">

										<div class="img-cart col-md-2">
											<p align="center"><img src="<?php echo $img_path ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" /></p>
										</div>

										<div class="title-cart col-md-4">
											<p class="cart-title"><a href=""><?php echo $row['products_name'] ?></a></p>
											<p class="cart-mini-features col-md-12"><?php echo $row['products_discription']?></p>
										</div>

										<div class="count-cart col-md-2">
											<ul class="input-count-style">

												<li>
													<p align="center" iid="" class="count-minus">-</p>
												</li>

												<li>
													<p align="center"><input id="input-id" iid="" class="count-input" maxlength="3" type="text" value="<?php echo $row['cart_count'] ?>" /></p>
												</li>

												<li>
													<p align="center" iid="" class="count-plus">+</p>
												</li>

											</ul>
										</div>

										<div id="" class="price-product col-md-2">
											<h5>
												<span class="span-count" ><?php echo $row['cart_count'] ?></span> 
												x 
												<span><?php echo $int ?></span>
											</h5>
											<p price="'.$row['products_price'].'" ><?php echo $row['products_price'] ?> руб</p>
										</div>
										<div class="delete-cart col-md-2">
											<div class="b-del">
												<a href="cart.php?id=<?php echo $row['cart_id'] ?>&action=delete" >
													<button class="button-prod-del btn btn-7 btn-7d btn-icon-only icon-remove">Пусто</button>
												</a>
											</div>
										</div>

									
									</div>
				<?php

							}while ($row = mysql_fetch_array($result));		    
								
				?>					 
									
									 <h2 class="itog-price" align="right">Итого: <strong><?php echo group_numerals($all_price) ?></strong> руб</h2>
									 <p align="right"  ><a href="cart.php?action=confirm" ><button id="bottom-cart-line" class="btn btn-7 btn-7a icon-truck">далее</button></a></p> 
									

						<?php }else{ ?>
									<h3 id="clear-cart" align="center">Корзина пуста</h3>
						<?php }		  

					break;

					}
                ?>
            </div>
        </div>
    </div>
</content>


	
