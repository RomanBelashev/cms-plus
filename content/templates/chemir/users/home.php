
           
               
   
<div id='txt' style="padding-top: 60px;"><p><b>Вы вошли как: <a href="?profile"><?php echo $_SESSION['users']['login']; ?></a></b>
|| <a href="?logout=<?php echo $_SESSION['users']['login']?>">Выход</a></p>

<?php
if($_SESSION['users']['login'] == "admin"):  ?>

    <p><a href="admin.php">В админку</a></p>
<?php endif; ?>
</div>
<hr />
<p><a href="?realtable" >Добавить объявление</a> </p>

<div id="edit">      
                  
           <table id="title" align="center">
               <tr id="shap">
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
              <tr id='tbl'> 
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
           <td><h4><a href="?edit_table">Изменить</a>||<a href="?delete_table">Удалить</a></h4></td>
           
                    
                    
                 
                <?php
            endwhile;
                ?>
            
    </table>
       </div>      