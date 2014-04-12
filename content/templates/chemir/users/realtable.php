<p><b>Вы вошли как: <a href="?profile"><?php echo $_SESSION['users']['login']; ?></a></b></p>
|| <a href="?logout=<?php echo $_SESSION['users']['login']?>">Выход</a>
<?php
if ($_POST) {
    
    $objcect = Simple::ClearData($_POST['objcect'], 's');
    $plan = Simple::ClearData($_POST['plan'], 's');
    $strit = Simple::ClearData($_POST['strit'], 's');

    $region = Simple::ClearData($_POST['region'], 's');
    $nhouse = Simple::ClearData($_POST['nhouse'], 'i');
    $level = Simple::ClearData($_POST['level'], 'i');
    $levelage = Simple::ClearData($_POST['levelage'], 'i');
    $periods = Simple::ClearData($_POST['periods'], 'i');
    $tel = Simple::ClearData($_POST['tel'], 's');
    $meb = Simple::ClearData($_POST['meb'], 's');
    $hol = Simple::ClearData($_POST['hol'], 's');
    $stir = Simple::ClearData($_POST['stir'], 's');
    $tv = Simple::ClearData($_POST['tv'], 's');
    $norus = Simple::ClearData($_POST['norus'], 's');
    $students = Simple::ClearData($_POST['students'], 's');
    $price = Simple::ClearData($_POST['price'], 'i');
    $photo = Simple::ClearData($_POST['photo'], 's');

    $userid = Loged::getIdUsers($_SESSION['users']['login']);
    $text = $_POST['text'];

  
    

    try {
        if (!Realtable::NewRec($objcect, $plan, $region, $strit,  $nhouse, $level, $levelage, $periods, $tel, $meb, $hol, $stir, $tv, $norus, $students, $price, $photo, $text, $userid))
            throw new Exception('Ошибка при добавлении данных в БД');
        else {
            echo 'Объявление успешно добавлено';
            echo "<meta http-equiv='refresh' content='2; url=index.php' />";
        }
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
}


?>
<center>
    
    <form method="post" id="art" name="art">
        <table id="title" align="center">
            <td class='title'><p align='center' class='p2'>Дата</p></td>
            <td class='title'><p align='center' class='p2'>Объект</p></td>
            <td class='title'><p align='center' class='p2'>Планировка</p></td>
            <td class='title'><p align='center' class='p2'>Район</p></td>
            <td class='title'><p align='center' class='p2'>Улица</p></td>
            <td class='title'><p align='center' class='p2'>Номер Дома</p></td>
            <td class='title'><p align='center' class='p2'>Этаж</p></td></tr>

            <td class='title'><p align='center' class='p2'><?php echo date('Y.m.d', time());?></p></td>
            <td class='title'><select name='objcect'>
                    <option value='комната'>Комната</option>
                    <option selected value='$objcect'></option>
                    <option value='1 комнатная'>1 комнатная</option>
                    <option value='2 комнатная'>2 комнатная</option>
                    <option value='3 комнатная'>3 комнатная</option>
                </select></td>

            <td class='title'><select name='plan'>
                    <option selected value=''></option>
                    <option value='Смежная'>Смежная</option>
                    <option value='Изолированная'>Изолированная</option>
                    <option value='Смежно-изолированная'>Смежно-изолированная</option>
                </select></td>




            <td class='title'><select name='region'>
                    <option selected value='Дзержинский'></option>
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


            <td class='title'><input value = '' name='strit' type='text' id='strit' /></td>
            <td class='title'><input value = '' name='nhouse' type='text' id='nhouse' /></td>
            <td class='title'><input value = '' name='level' type='text' id='level' /></td></tr>

            <td class='title'><p align='center' class='p2'>Этажность</p></td>
            <td class='title'><p align='center' class='p2'>Период сдачи</p></td>
            <td class='title'><p align='center' class='p2'>тел</p></td>
            <td class='title'><p align='center' class='p2'>меб</p></td>
            <td class='title'><p align='center' class='p2'>хол</p></td>
            <td class='title'><p align='center' class='p2'>тв</p></td>
            <td class='title'><p align='center' class='p2'>стир</p></td>
            </tr>      
            <td class='title'><input value = '' name='levelage' type='text' id='levelage' /></td>



            <td class='title'><select name='periods' >
                    <option selected value=''></option>
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
                    <input value = "" name="tel" type="checkbox" id="tel" onclick="if (document.getElementById('tel').checked) {
                    document.getElementById('tel').value = 'есть'
                } else {
                    document.getElementById('tel').value = ''
                }
                "    /></p></td> 
            <td class='title'><p align='center' class='p2'>
                    <input value = ""  name ="meb" type="checkbox" id = "meb" onclick="if (document.getElementById('meb').checked) {
                    document.getElementById('meb').value = 'есть'
                } else {
                    document.getElementById('meb').value = ''
                }
                "     /></p></td>
            <td class='title'><p align='center' class='p2'>
                    <input value = "" name="hol" type="checkbox" id="hol" onclick="script: if (document.getElementById('hol').checked) {
                    document.getElementById('hol').value = 'есть'
                } else {
                    document.getElementById('hol').value = ''
                }
                "    /></p></td>
            <td class='title'><p align='center' class='p2'>
                    <input value = "" name="tv" type="checkbox" id="tv" onclick="script: if (document.getElementById('tv').checked) {
                    document.getElementById('tv').value = 'есть';
                } else {
                    document.getElementById('tv').value = '';
                }
                "  /> </p></td>
            <td><p>
                    <input value = "" name="stir" type="checkbox" id="stir" onclick="if (document.getElementById('stir').checked) {
                    document.getElementById('stir').value = 'есть';
                } else {
                    document.getElementById('stir').value = '';
                }
                "/></p></td></tr>

            <td class='title'><p align='center' class='p2'>Берут нерусских</p></td><td class='title'><p align='center' class='p2'>Берут студентов</p></td><td class='title'><p align='center' class='p2'>user</p></td><td class='title'><p align='center' class='p2'>цена</p></td></tr>
            <td class='title'><p align='center' class='p2'><input value = "" name="norus" type="checkbox" id="norus" onclick="if (document.getElementById('norus').checked) {
             document.getElementById('norus').value = 'да'
         } else {
             document.getElementById('norus').value = ''
         }
         " /></p></td>
            <td class='title'><p align='center' class='p2'><input value = "" name="students" type="checkbox" id="students" onclick="if (document.getElementById('students').checked) {
            document.getElementById('students').value = 'да'
        } else {
            document.getElementById('students').value = ''
        }
        " /></p></td>

            <td class='title'><p align='center' class='p2'><?php echo $_SESSION['users']['login'] ?></p></td>
            <td class='title'><input value = '' name='price' type='text' id='price' /></td> 
            <td class='title'><input name='user' type='hidden' value='<?php echo $_SESSION['users']['login'] ?>'/></td>
            <td class='title'><input name='photo' type='hidden' value='$photo'/></td>
            <td class='title'><input name='id' type='hidden' value='$id'/></td>
            </tr>

            <td class='title'></td><td colspan='17' class='title'><p align='center' class='p2'>Описание</p></td></tr> 


            <td colspan='18' class='title'><textarea  name='text' cols='120' rows='4'></textarea></td></tr>          

            	   
            <td  class='title'><input type='submit' name='save' value='Добавить фото' /></td>
        </table>
        <input type="submit" name="article" value="Добавить объявление" class="button" style="width:350px" />

    </form>


</center>
