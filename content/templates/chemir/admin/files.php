<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/loged.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/entity/files.php';

$files = new MediaContent();
if($_POST['button']){
       $path = 'http://'.DOMAIN.'/files/'.$_FILES['userfile']['name'];
       echo "user".$userid = Loged::getIdUsers($_SESSION['users']['login']);
       try{
           //Получаем расширение файла
           if(!$files->extendsFiles($_FILES['userfile']['name']))
               throw new Exception ('Не удалось получить расширение файла');
           else {
               $ext = $files->extendsFiles($_FILES['userfile']['name']);
               // Записываем данные в БД
               if(!Loged::newFile($path, $ext, $_FILES['userfile']['name'], $userid))
                   throw new Exception('Ошибка при сохранении файла в БД');
               if(!$files->newFiles($_FILES['userfile']['name'], $_FILES['userfile']['tmp_name']))
                   throw new Exception ('Ошибка при загрузке файла');
               else 
                   echo 'Файл загружен успешно';
               
           }
       } catch (Exception $ex) {
           die($ex->getMessage());

       }
}
?>
<center>
    <p>
        <strong>Выбрать файл для загрузки</strong></p><br />
    <form enctype="multipart/form-data" method="post">
        <input type="file" name="userfile" />  <br />
        <input type="submit" value="Загрузить" name="button" class="button" />
        
    </form> 
  
  <p><div class="st"><h3>Загруженные файлы</h3></div> 
<br />

<table border="2" width="100%">
    <tr><td>Путь</td>
        <td>Расширение файла</td>
        <td>Тип файла</td>
        <td>Загрузил</td>
    
    
    </tr>
    
    

    <?php
    $query = Loged::showFiles();
    while($row = $query->fetch_assoc()):
    
    ?>
    <tr><td><a href="<?php echo $row['path']; ?>"><?php echo $row['path']; ?></a></td>
        <td><?php echo $row['extension']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td><?php 
        $user = Loged::getUser($row['users_idusers']);
        echo $user['login'];
        ?></td>
    
    
    </tr>
    <?php endwhile; ?>
    </table>
</center>
