<?php
if($_POST){
    $title = Simple::ClearData($_POST['title'], 's');
    $description = Simple::ClearData($_POST['description'], 's');
    $prw_text = $_POST['prw_text'];
    $text = $_POST['text'];
    $keywords = Simple::ClearData($_POST['keywords'], 's');
    $status = (int)$_POST['on'];
    $userid = Loged::getIdUsers($_SESSION['users']['login']);
    
    if($title == "") 
        die ("Заголовок не введён");
     if($description == "") 
        die ("Описание не введённо");
     if($text == "") 
        die ("Текст не введён");
     if($prw_text == "") 
        die ("Краткий текст не введён");
     try{
         if(!Article::NewArticle($title,$description, $prw_text, $text, $keywords,  $status, $userid))
             throw new Exception('Ошибка при добавлении данных в БД');
         else {
             echo 'Статья успешно добавлена';
         }
     } catch (Exception $ex) {
         die($ex->getMessage());

     }
}
?>
<center>
    <h4><a href="?page=edit_article">Изменить</a>||<a href="?page=delete_article">Удалить</a></h4>
    <div class="st"><h3>Добавление новой статьи</h3></div>
    <br />
    <form method="post" id="art" name="art">
        <p>Заголовок статьи:<br /><input type="text" name="title" style="width:350px;" /></p>
   
    <p>Описание статьи:<br /><input type="text" name="description" style="width:350px;" /></p>
    <?php if(Loged::Editor() == 1): ?>
    <p> Краткий текст: <br /><textarea name="prw_text" id="prw_text" style="width:350px;"></textarea></p>
    <p> Полный текст: <br /><textarea name="text" id="text" style="width:350px;"></textarea></p>
    <script type="text/javascript">
    CKEDITOR.replace('prw_text');
    CKEDITOR.replace('text');
    </script>
    <?php else: ?>
    <p> Краткий текст: <br /><textarea name="prw_text"  style="width:350px;"></textarea></p>
    <p> Полный текст: <br /><textarea name="text"  style="width:350px;"></textarea></p>
    <?php endif;?>
    <p>Ключевые слова:<br /><input type="text" name="keywords" style="width:350px;" /></p>
    <p style="width:350px;">Статус статьи:<br /></p>
    <table style="border:1px solid; background:#fff;"><tr><td>Опубликовано</td><td><input type="radio" name="on" value="1" checked/></td></tr>
    <tr><td>Черновик</td><td><input type="radio" name="on" value="0" /></td></tr>    
    </table>
    <p><input type="submit" name="article" value="Добавить статью" class="button" style="width:350px" /></p>
 </form>

</center>
