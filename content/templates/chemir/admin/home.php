<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/loged.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/article.php';

?>

<center>
    
<td class="main">
                
                  
           <table id="title" align="center">
               <tr>
            <td  ><p align="center" ><a href="#">Дата/время</a></p></td>   
              <td ><p align='center' >Объект</p></td>
              <td ><p align='center' >Планировка</p></td>
              <td ><p align='center' >Район</p></td>
              <td ><p align='center' >Улица</p></td>
              <td ><p align='center' >Номер Дома</p></td>
              <td ><p align='center' >Этаж</p></td>
              <td ><p align='center' >Этажность</p></td>
              <td ><p align='center' >Период сдачи</p></td>
              <td ><p align='center' >тел</p></td>
              <td ><p align='center' >меб</p></td>
              <td ><p align='center' >хол</p></td>
              <td ><p align='center' >тв</p></td>
              <td ><p align='center' >стир</p></td>
              <td ><p align='center' >Берут нерусских</p></td>
              <td ><p align='center' >Берут студентов</p></td>
              <td ><p align='center' >user</p></td>
              <td ><p align='center' >цена</p></td></tr> 
           
           
            <?php
                
                $query = Realtable::ShowRecUser(Loged::getIdUsers($_SESSION['users']['login']));
                while ($rea = $query->fetch_assoc()):
                
                ?>
               <tr>  
            <td  ><p align="center" ><?php echo date('Y.m.d - H:I:s',$rea['date']); ?></p></td>   
              <td ><p align='center' ><?php echo $rea['objcect']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['plan']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['region']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['strit']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['nhouse']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['level']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['levelage']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['periods']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['tel']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['meb']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['hol']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['tv']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['stir']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['norus']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['students']; ?></p></td>
              <td ><p align='center' ><?php echo $_SESSION['users']['login']; ?></p></td>
              <td ><p align='center' ><?php echo $rea['price']; ?></p></td></tr> 
           <td colspan='17' id='tit'><p align='left'><?php echo $rea['text']; ?></p></td>
           <td><h4><a href="?page=edit_table">Изменить</a>||<a href="?page=delete_table">Удалить</a></h4></td>
           
                    
                    
                 
                <?php
            endwhile;
                ?>
            
    </table>
    <div class="st"><h3>Основные параметры</h3></div>
</center>
<table border="0" width="100%">
    <tr>
        <td><b>Количество статей: <?php echo Article::CountToArticle() ?> </b></td>
        <td><b>Количество пользователей: <?php echo Loged::CountToUsers() ?> </b></td>
    </tr>
    
</table>
