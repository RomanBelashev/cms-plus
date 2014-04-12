<?php
if (!$_GET || $_GET['page'] == 1):
    ?>
    <div class="step"> Шаг <?php echo $_GET['page'] = $_GET['page'] ? $_GET['page'] : 1; ?> из трёх</div>
    <div class="content">
        <div class="text">

            <form name="copy" action="?page=2" method="post">
                <h3>Лицензионное соглашение</h3>
                <textarea name="copy" rows="5" cols="65" wrap="off" disabled>
                    <?php echo Simple::openTextFiles('engine/install/install.dat') ?>
                </textarea>
                <p><b> Согласен с условиями: </b>  <input type="checkbox" name="yes" value="ok"></p>
                <input type="submit" value="Далее" class="button" name="system" onclick="getCheck(this.form)" />
            </form>
        </div>
    </div>
<?php elseif ($_GET['page'] == 2): ?>
    <div class="step">Шаг <?php echo $_GET['page'] = $_GET['page'] ? $_GET['page'] : 2; ?> из 3</div>
    
        
    <div class="content">
        <div class="text">  
            <h2>Установка Базы данных</h2>
            <p>Укажите данные вашего MySQL сервера</p>
            <form action="?page=3" method="post">
                <fieldset>
                    <legend>Настройка базы данных</legend>
                    <p><b>Имя Базы Данных: *</b><br />
                        <input name="dbname" type="text" value=""><br />
                        <i>Если вы ещё не создали БД, создайте её сейчас. В случае если БД не будет найдена, система попробует создать её автоматически</i>
                </fieldset>
                <fieldset>
                    <legend>Имя пользователя MySQL</legend>
                    <p><b>Имя Пользователя: *</b><br />
                        <input name="dbuser" type="text" value=""><br />
                        <i>Имя пользователя сервера MySQL (по умолчанию root)</i>
                </fieldset>
                <fieldset>
                    <legend>Пароль пользователя MySQL</legend>
                    <p><b>Пароль Пользователя: *</b><br />
                        <input name="dbpassword" type="password" value=""><br />
                        <i> Пароль пользователя сервера MySQL</i>
                </fieldset>
                <fieldset>
                    <legend>Имя сервера MySQL</legend>
                    <p><b>Имя сервера: *</b><br />
                        <input name="dbserver" type="text" value=""><br />
                        <i> Сервер баз данных MySQL (по умолчанию localhost)</i>
                </fieldset>
                <br />
                <b> * - Обязательные для заполнения поля</b>
                <input type="submit" value="Далее" class="button" name="second" onclick="validate(this.form)" />
            </form>
        </div>
    </div>
    
<?php elseif ($_GET['page'] == 3): ?>
    <div class="step">Шаг <?php echo $_GET['page'] = $_GET['page'] ? $_GET['page'] : 3; ?> из 3</div>
   
    
    <div class="content">
        <div class="text">  
            <form method="post">
                <fieldset>
                    <legend>E-mail администратора</legend>
                    <p><b>E-mail админа: *</b><br />
                        <input type="text" name="adminemail" value=""><br />
                        <i>На данный E-Mail будут приходить различные уведомления системы </i></p>
                </fieldset> 
                <fieldset>
                    <legend>Логин администратора</legend>
                    <p><b>Логин админа: *</b><br />
                        <input type="text" name="adminlogin" value=""><br />
                        <i>Логин администратора понадобится для входа в систему </i></p>
                </fieldset> 
                <fieldset>
                    <legend>Пароль администратора</legend>
                    <p><b>Пароль админа: *</b><br />
                        <input type="password" name="adminpassword" value=""><br />
                        <i>Пароль администратора понадобится для входа в систему </i></p>
                </fieldset> 
                <input type="submit" value="Готово" class="button" name="third"  />
            </form>
        </div>
    </div>
<?php endif; 

