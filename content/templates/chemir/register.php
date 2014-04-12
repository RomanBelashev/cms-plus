<div class="reg">
    <form method="post">
        <h2>Регистрация</h2>
        <p><b>Логин:</b><br /><input type="text" name="login" />
            <br /><i>Латинскими символами</i></p>
        <p><b>E-mail:</b><br /><input type="text" name="email" /></p>  
        <p><b>Пароль:</b><br /><input type="password" name="password" /><br />
            <i>От 6 до 35 символов</i></p>
        <p><b>Повторите пароль:</b><br /><input type="password" name="repassword" /><br />
         
            <input type="submit" name="register" class="button" onclick="return validate(this.form)"/>
    </form>
    <b>* - Все поля обязательны для заполнения</b>
</div>

