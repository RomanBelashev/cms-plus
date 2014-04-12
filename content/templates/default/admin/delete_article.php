<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/loged.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/article.php';

if($_GET){ 
    $del_id = (int)$_GET['delete_article'];
    if(!$del_id) goto delete; // если пользователь пришёл без параметров перекидываем на метку delete
    try{
        if(!Article::DeleteArticle($del_id))
            throw new Exception ('Ошибка при удалении статьи');
        else {
            echo "статья успешно удалена";
        }
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
    delete:
        echo "<hr />";
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
                    <td><b>Автор статьи:</b><?php $auther = Loged::getUser($art['idarticles']); echo $auther['login'];?></td>
                    </tr>
                    <tr><td colspan="2">
                        <?php echo $art['prew']; ?>
                            <br />
                            <a href="index.php?delete_article=<?php echo $art['idarticles']; ?>">Удалить</a>
                        </td>
                    </tr>
                </table>
                <?php
            endwhile;
               
}
            ?>


