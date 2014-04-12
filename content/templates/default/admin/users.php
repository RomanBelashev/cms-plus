<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/users.php';

if($_POST){
    try{
        $login = Simple::ClearData($_POST['login'], 's');
        $email = Simple::ClearData($_POST['email'], 's');
        $role = $_POST['role'];
        $uid = $_POST['id'];
        
        if(!Users::updateUser($login,$email,$role,$uid))
            throw new Exception('Ошибка при изменении данных');
        else echo "Данные успешно отредактированы";
    } catch (Exception $ex) {
              die($ex->getMessage());
    }
}  
    if($_GET){
        $uid = (int)$_GET['users']; 
        if(!$uid) goto edit_s;
        if(!Users::showUsersId($uid))
            die ('Ошибка выборки юзера');
    
    else {
        $r = Users::showUsersId($uid);
        ?>
<form method="post">
    <table border="2" width="100%">
        <tr>
            <td>Логин:</td><td><input type="text" value="<?php echo $r['login']; ?>" name="login" /></td>
            <td>E-mail:</td><td><input type="text" value="<?php echo $r['email']; ?>" name="email" /></td>
            <td><input type="hidden" value="<?php echo $r['idusers']; ?>" name="id" /></td>
            <td>Роль(<?php echo Simple::getRole($r['role']);?>)</td>
            <td>
            <select size="1" name="role">
            <option value="1">Пользователь</option>
            <option value="2">Автор</option>
            <option value="3">Администратор</option>
            </select></td>
        </tr>
        <tr><td colspan="6" aligh="center" ><input type="submit" value="Изменить" class="button" /></td>
    </table>
</form>
<?php
    }
}
edit_s:
?>
<div class="st"><h3>Пользователи сайта</h3></div>
<table border="2" width="100%">
    <tr>
        <td>Логин</td>
        <td>E-mail</td>
        <td>Роль</td>
        <td>Изменить данные юзера</td>
        <td>Удалить юзера</td>
    </tr>
    <?php
    $query = Loged::showUsers();
    while($row = $query->fetch_assoc()):
    
    ?>
    <tr>
        <td><?php echo $row['login']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php 
        echo Simple::getRole($row['role']);
        ?></td>
        <td><a href="index.php?users=<?php echo $row['idusers']; ?>">Изменить </a></td>
        <td><a href="index.php?delete_users=<?php echo $row['idusers']; ?>">Удалить </a></td>
    </tr>
    <?php endwhile; ?>
 </table>
