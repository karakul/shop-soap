<!--форма входа-->
<form id="login-form" class="login-form">
    <i class="close fa fa-times-circle fa-2x" aria-hidden="true"></i>
	<h2>Авторизация</h2>
	<i class="fa fa-envelope-o fa-1x ic-email" aria-hidden="true"></i>
	<input type="text" class="user" id="user" />
	<label for="password" class="icon-lock">Пароль:</label>
	<input type="password" class="password" id="password" />
	<label for="remember"><input type="checkbox" id="remember" /><span class="remember"/> Запомнить меня</label>
	<input type="submit" id="login" value="Войти" />
	<div class="extra">
		<a href="#" class="forgetPassword">Забыл пароль</a><a href="#" class="facebook icon-facebook">Facebook</a><a href="#" class="googlePlus icon-vk">vk</a>
	</div>
</form>


<form id="login-form-vos" class="login-form-vos">
    <i class="close fa fa-times-circle fa-2x" aria-hidden="true"></i>
	<h3>ваш Email?</h3>
	<input type="text" id="remind-email" id="password" />

	<input type="submit" id="login_vos" value="Ok" />

</form>