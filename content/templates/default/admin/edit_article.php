<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/loged.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/article.php';
if($_GET){ 
    $edit_id = (int)$_GET['edit_article'];
    if(!$edit_id) goto edit;
    $article = Article::ShowArticleId($edit_id);
    $res = $article->fetch_assoc(); print_r($res);
    
}

if($_POST){
    try {
        if(!Article::UpdateArticle($_POST))
            throw new Exception ('Ошибка при изменении статьи');
        else {
            
            echo "Статья успешно обновлена";
        }
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
}
?>
<center>
    <div class="st"><h3>Изменение статьи</h3></div>
    <br />
    <form method="post" id="art" name="art">
        <p>Заголовок статьи:<br /><input type="text" name="title" style="width:350px;" value="<?php echo $res['title']; ?>" /></p>
   
    <p>Описание:<br /><input type="text" name="description" style="width:350px;" value="<?php echo $res['description']; ?>"/></p>
    <?php if(Loged::Editor() == 1): ?>
    <p> Краткий текст: <br /><textarea name="text_prw" id="text_prw" style="width:350px;" ><?php echo $res['prew']; ?></textarea></p>
    <p> Полный текст: <br /><textarea name="text" id="text" style="width:350px;"><?php echo $res['text']; ?></textarea></p>
    <script type="text/javascript">
    CKEDITOR.replace('text_prw');
    CKEDITOR.replace('text');
    </script>
    <?php else: ?>
    <p> Краткий текст: <br /><textarea name="text_prw"  style="width:350px;"><?php echo $res['prew']; ?></textarea></p>
    <p> Полный текст: <br /><textarea name="text"  style="width:350px;"><?php echo $res['text'];?></textarea></p>
    <?php endif;?>
    <p>Ключевые слова:<br /><input type="text" name="keywords" style="width:350px;" value="<?php echo $res['keywords'];?>"/></p>
    <p style="width:350px;">Статус статьи:<br /></p>
    <table style="border:1px solid; background:#fff;"><tr><td>Опубликовано</td><td><input type="radio" name="on" value="1" checked/></td></tr>
    <tr><td>Черновик</td><td><input type="radio" name="on" value="0" /></td></tr>    
    </table>
    <input type="hidden" name="id" value="<?php echo $res['idarticles']; ?>" />
    <input type="hidden" name="date_create" value="<?php echo $res['date_create']; ?>" />
    <p><input type="submit" name="article" value="Изменить статью" class="button" style="width:350px" /></p>
 </form>

</center>
<hr />
<?php
edit:
    $query = Article::ShowArticle(5);
while ($art = $query->fetch_assoc()):
                
                ?>
                <table>
                    <tr><td colspan="2"><h2><a href="?article=<?php echo $art['idarticles']; ?>"><?php echo $art['title']; ?></a></h2></td></tr>
                    <tr><td><b>Дата создания статьи:</b><?php echo date('Y.m.d - H:I:s',$art['date_create']); ?></td>
                    <td><i>Последнее редактирование: <?php if (!$art['date_create']) {
                        echo date('Y.m.d - H:I:s',$art['date_create']);
                    }  else {
                        echo date('Y.m.d - H:I:s',$art['date_edit']);
                    }
                        
                        
                    ?></i></td>
                    <td><b>Автор статьи:</b><?php $auther = Loged::getUser($art['users_idusers']); echo $auther['login'];?></td>
                    </tr>
                    <tr><td colspan="2">
                        <?php echo $art['prew']; ?>
                            <br />
                            <a href="index.php?edit_article=<?php echo $art['idarticles']; ?>">Изменить</a>
                        </td>
                    </tr>
                </table>
                <?php
            endwhile;
                ?>

