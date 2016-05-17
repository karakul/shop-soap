<!--форма регистрации на сайте-->
<form class="contact_form" id="contact_form" action="../validate/registration.php"  method="post">

    <ul>
        <li>
             <h2>Регистрация</h2>
             <i class="close-reg fa fa-times-circle fa-2x" aria-hidden="true"></i>
             <span class="required_notification">* обязательные поля длязаполнения</span>
             <div id="reg_message"></div>
             
        </li>
        <li>
            <label for="name">ФИО:</label>
            <input type="text" class="user" id="fio" name="fio" />
        </li>
         <li>
            <label for="message">Пароль:</label>
            <input type="password"  class="user" id="pass" name="pass"  />
        </li>
        <li>
            <label for="message">Повторите пароль:</label>
            <input type="password" class="user"  name="pass2" id="pass2"/>
        </li>
        <li>
            <label for="email">E-mail:</label>
            <input type="text" class="user" id="email"  name="email" />
        </li>
        <li>
            <label for="website">Телефон:</label>
            <input type="text" class="user"  name="number" id="number"/>
        </li>
        <li>
            <label for="website">Адрес:</label>
            <input type="text" class="user"  name="addres" id="addres"/>
        </li>
        <li>
        	<input type="submit" id="click_submit" value="Зарегистрироваться">
        </li>
    </ul>

</form>
