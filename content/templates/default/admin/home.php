<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/loged.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/article.php';
?>
<center>
    
    <div class="st"><h3>Основные параметры</h3></div>
</center>
<table border="0" width="100%">
    <tr>
        <td><b>Количество статей: <?php echo Article::CountToArticle() ?> </b></td>
        <td><b>Количество пользователей: <?php echo Loged::CountToUsers() ?> </b></td>
    </tr>
    
</table>