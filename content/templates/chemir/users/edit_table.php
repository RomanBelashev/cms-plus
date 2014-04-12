<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/loged.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/realtable.php';
if($_GET){ 
    $edit_id = (int)$_GET['edit_table'];
    if(!$edit_id) goto edit;
    $rec = Realtable::ShowRecId($edit_id);
    $res = $rec->fetch_assoc(); 
    
}

if($_POST){
    try {
        if(!Realtable::UpdateRec($_POST))
            throw new Exception ('Ошибка при изменении статьи');
        else {
            
            echo "<p align='center'>Объявление отредактировано</p>";
             echo "<meta http-equiv='refresh' content='2; url=index.php' />";
        }
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
}
?>

  
    <div id="edit">  
    <form method="post" id="art" name="art">
        <table id="title" align="center" >
            <td class='title'><p align='center' class='p2'>Дата</p></td>
            <td class='title'><p align='center' class='p2'>Объект</p></td>
            <td class='title'><p align='center' class='p2'>Планировка</p></td>
            <td class='title'><p align='center' class='p2'>Район</p></td>
            <td class='title'><p align='center' class='p2'>Улица</p></td>
            <td class='title'><p align='center' class='p2'>Номер Дома</p></td>
            <td class='title'><p align='center' class='p2'>Этаж</p></td></tr>

        <td class='title'><p align='center' class='p2' ><?php echo date('Y.m.d ', $res['date']); ?></p></td>
            <td class='title'><select name='objcect'>
                    <option value='комната'>Комната</option>
                    <option selected value=''><?php echo $res['objcect']; ?></option>
                    <option value='1 комнатная'>1 комнатная</option>
                    <option value='2 комнатная'>2 комнатная</option>
                    <option value='3 комнатная'>3 комнатная</option>
                </select></td>

            <td class='title'><select name='plan'>
                    <option selected value=''><?php echo $res['plan']; ?></option>
                    <option value='Смежная'>Смежная</option>
                    <option value='Изолированная'>Изолированная</option>
                    <option value='Смежно-изолированная'>Смежно-изолированная</option>
                </select></td>




            <td class='title'><select name='region'>
                    <option selected value=''><?php echo $res['region']; ?></option>
                    <option value='Дзержинский'>Дзержинский</option>
                    <option value='Железнодорожный'>Железнодорожный</option>
                    <option value='Заельцовский'>Заельцовский</option>
                    <option value='Калининский'>Калининский</option>
                    <option value='Кировский'>Кировский</option>
                    <option value='Ленинский'>Ленинский</option>
                    <option value='Октябрьский'>Октябрьский</option>
                    <option value='Первомайский'>Первомайский</option>
                    <option value='Советский'>Советский</option>
                    <option value='Центральный'>Центральный</option>

                </select></td>


                <td class='title'><input value = '<?php echo $res['strit']; ?>' name='strit' type='text' id='strit' size='10' /></td>
            <td class='title'><input value = '<?php echo $res['nhouse']; ?>' name='nhouse' type='text' id='nhouse' /></td>
            <td class='title'><input value = '<?php echo $res['level']; ?>' name='level' type='text' id='level' /></td></tr>

            <td class='title'><p align='center' class='p2'>Этажность</p></td>
            <td class='title'><p align='center' class='p2'>Период сдачи</p></td>
            <td class='title'><p align='center' class='p2'>тел</p></td>
            <td class='title'><p align='center' class='p2'>меб</p></td>
            <td class='title'><p align='center' class='p2'>хол</p></td>
            <td class='title'><p align='center' class='p2'>тв</p></td>
            <td class='title'><p align='center' class='p2'>стир</p></td>
            </tr>      
            <td class='title'><input value = '<?php echo $res['levelage']; ?>' name='levelage' type='text' id='levelage' /></td>



            <td class='title'><select name='periods' >
                    <option selected value=''><?php echo $res['periods']; ?></option>
                    <option value='Долгосрочно'>Долгосрочно</option>
                    <option value='1 месяц'>1 месяц</option>
                    <option value='2 месяца'>2 месяца</option>
                    <option value='3 месяца'>3 месяца</option>
                    <option value='4 месяца'>4 месяца</option>
                    <option value='5 месяцев'>5 месяцев</option>
                    <option value='6 месяцев'>6 месяцев</option>
                    <option value='7 месяцев'>7 месяцев</option>
                    <option value='8 месяцев'>8 месяцев</option>
                    <option value='9 месяцев'>9 месяцев</option>
                    <option value='10 месяцев'>10 месяцев</option>
                    <option value='11 месяцев'>11 месяцев</option>
                    <option value='Год'>Год</option>

                </select></td>


            <td class='title'><p align='center' class='p2'>
                    <input value = "<?php echo $res['tel']; if ($res['tel'] == 'есть') {$check_tel = 'checked';} else {$check_tel = '';} ?>" name="tel" type="checkbox" id="tel" onclick="if (document.getElementById('tel').checked) {
                    document.getElementById('tel').value = 'есть'
                } else {
                    document.getElementById('tel').value = ''
                }
                "  <?php echo $check_tel; ?>  /></p></td> 
            <td class='title'><p align='center' class='p2'>
                    <input value = "<?php echo $res['meb']; if ($res['meb'] == 'есть') {$check_meb = 'checked';} else {$check_meb = '';} ?>"  name ="meb" type="checkbox" id = "meb" onclick="if (document.getElementById('meb').checked) {
                    document.getElementById('meb').value = 'есть'
                } else {
                    document.getElementById('meb').value = ''
                }
                "  <?php echo $check_meb; ?>    /></p></td>
            <td class='title'><p align='center' class='p2'>
                    <input value = "<?php echo $res['hol']; if ($res['hol'] == 'есть') {$check_hol = 'checked';} else {$check_hol = '';} ?>" name="hol" type="checkbox" id="hol" onclick="script: if (document.getElementById('hol').checked) {
                    document.getElementById('hol').value = 'есть'
                } else {
                    document.getElementById('hol').value = ''
                }
                "  <?php echo $check_hol; ?>  /></p></td>
            <td class='title'><p align='center' class='p2'>
                    <input value = "<?php echo $res['tv']; if ($res['tv'] == 'есть') {$check_tv = 'checked';} else {$check_tv = '';} ?>" name="tv" type="checkbox" id="tv" onclick="script: if (document.getElementById('tv').checked) {
                    document.getElementById('tv').value = 'есть';
                } else {
                    document.getElementById('tv').value = '';
                }
                " <?php echo $check_tv; ?> /> </p></td>
            <td><p>
                    <input value = "<?php echo $res['stir']; if ($res['stir'] == 'есть') {$check_stir = 'checked';} else {$check_stir = '';} ?>" name="stir" type="checkbox" id="stir" onclick="if (document.getElementById('stir').checked) {
                    document.getElementById('stir').value = 'есть';
                } else {
                    document.getElementById('stir').value = '';
                }
                "  <?php echo $check_stir; ?> /></p></td></tr>

            <td class='title'><p align='center' class='p2'>Берут нерусских</p></td><td class='title'><p align='center' class='p2'>Берут студентов</p></td><td class='title'><p align='center' class='p2'>user</p></td><td class='title'><p align='center' class='p2'>цена</p></td></tr>
            <td class='title'><p align='center' class='p2'><input value = "<?php echo $res['norus']; if ($res['norus'] == 'есть') {$check_norus = 'checked';} else {$check_norus = '';} ?>" name="norus" type="checkbox" id="norus" onclick="if (document.getElementById('norus').checked) {
             document.getElementById('norus').value = 'да'
         } else {
             document.getElementById('norus').value = ''
         }
         " <?php echo $check_norus; ?> /></p></td>
            <td class='title'><p align='center' class='p2'><input value = "<?php echo $res['students']; if ($res['students'] == 'есть') {$check_students = 'checked';} else {$check_students = '';} ?>" name="students" type="checkbox" id="students" onclick="if (document.getElementById('students').checked) {
            document.getElementById('students').value = 'да'
        } else {
            document.getElementById('students').value = ''
        }
        " <?php echo $check_students; ?>/></p></td>

            <td class='title'><p align='center' class='p2'><?php echo $_SESSION['users']['login'] ?></p></td>
            <td class='title'><input value = '<?php echo $res['price']; ?>' name='price' type='text' id='price' /></td> 
            <td class='title'><input name='user' type='hidden' value='<?php echo $_SESSION['users']['login'] ?>'/></td>
            <td class='title'><input name='photo' type='hidden' value='<?php echo $res['photo']; ?>'/></td>
            <td class='title'><input name='idd' type='hidden' value='<?php echo $res['idd']; ?>'/></td>
            </tr>

            <td class='title'></td><td colspan='17' class='title'><p align='center' class='p2'>Описание</p></td></tr> 


            <td colspan='18' class='title'><textarea  name='text' cols='120' rows='4'></textarea></td></tr>          

            	   
            <td  class='title'><input type='submit' name='save' value='Добавить фото' /></td>
        </table>
        <input type="submit" name="but" value="Редактировать объявление" class="button" style="width:350px" />

    </form>


    </div>
<hr />
<?php
edit:  
    
    
    
    $query = Realtable::ShowRecUser(Loged::getIdUsers($_SESSION['users']['login']));
while ($rea = $query->fetch_assoc()):
                
                ?>


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
           
                    
           <td><a href="index.php?edit_table=<?php echo $rea['idd']; ?>">Изменить</a>
                        </td>
                    </tr>
                
    
                <?php
            endwhile;
                ?>
</table>
</div>