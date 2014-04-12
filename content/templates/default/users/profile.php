<center><div class="st"><h3>Профиль пользователя <?=$_SESSION['users']['login'] ?></h3></div></center> <!--укороченный синтаксис-->
<?php 
// Получаем id пользователя
$idusers = Loged::getIdUsers($_SESSION['users']['login']);
//Выбираем все данные из БД
$profile = Loged::getUser($idusers);

$login = trim($profile['login']);
$email = trim($profile['email']);
$role = trim((int)$profile['role']);

$role_id = Simple::getRole($role);

if($_POST){
    $login = Simple::ClearData($_POST['login'], 's');
    $email = Simple::ClearData($_POST['email'], 's');
    $password = Simple::HashPassword($_POST['password']);
    if($login == "" && $email == "")
        die ('Не введены данные');
    try {
        if (!Loged::setUser($login,$email,$password,$id))
            throw new Exception ("Ошибка при изменении данных");
        else {
            $_SESSION['users']['login'] = $login;
            echo "Данные успешно изменены";
        }
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
}
?>

<table>
    <tr>
        
        <td>Ваш логин:</td><td><?=$login;?></td>
    </tr>
     <tr>
        
        <td>Ваш email:</td><td><?=$email;?></td>
    </tr>
     <tr>
        
        <td>Вы состоите в группе:</td><td><?=$role_id;?></td>
    </tr>
</table>
<center><div class="st"><h3><a href="#">Изменить данные</a></h3></div></center>
<div class="myfrm" style="display:none;">
    <center>
        <br />
        <h4>Изменение данных пользователя:</h4>
        <form method="post">
            <table>
                <tr><td>Ваш логин:</td><td><input type="text" name="login" value="<?=$login ?>" /></td></tr>
                <tr><td>Ваш email:</td><td><input type="text" name="email" value="<?=$email ?>" /></td></tr>
                <tr><td>Ваш пароль:</td><td><input type="password" name="password" value="" /></td></tr>
                <tr><td colspan="2" ><input type="submit" value="Изменить" class="button" onclick="validate(this.form)" /></td></tr>
            </table>
        </form>
    </center>
    
    
</div>
<script type="text/javascript">
$('.st').click(function(){
    $('.myfrm').fadeIn(2000);     /* функция Отобразить скрытый элемент за 2 сек*/
});

</script>
    