<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/loged.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/article.php';
if($_GET['article']){
    $art_id = (int)$_GET['article'];
    $query = Article::ShowArticleId($art_id);
    
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
                        <?php echo $art['prew'].$art['text']; ?>
                            <br />
                            
                        </td>
                    </tr>
    
</table>
<?php

 endwhile;
}
 ?>