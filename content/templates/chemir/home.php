
                
       
       
               
   
    <div id='txt'><p><b>Здравствуйте и процветайте! <br/>Наш простой бесплатный сервис для тех людей, кто хочет сдать/продать/обменять недвижимость в аренду в городе Новосибирске, 
                напрямую общаясь со своим клиентом. А тот, кто хочет арендовать/купить/обменять жильё или помещение, может договориться о встрече или задать вопрос владельцу недвижимости с помощью услуги мнгновенных сообщений нашего сайта.
           </b></p> </div>
        
    
           
           <table id="title" align="center">
               <tr id="shap">
            <td  ><p align="center" ><a href="#">Дата/время</a></p></td>   
              <td ><p align='center' >Объект</p></td>
              <td ><p align='center' >Планировка</p></td>
              <td ><p align='center' >Улица</p></td>
              <td ><p align='center' >Район</p></td>
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
              <td ><p align='center' >Пользователь</p></td>
              <td ><p align='center' >цена</p></td></tr> 
           
           
            <?php
                
                $query = Realtable::ShowRec(10);
                while ($art = $query->fetch_assoc()):
                
                ?>
               
               <tr id='tbl'>  
                  
            <td  ><p align="center" ><?php echo date('Y.m.d - H:I:s',$art['date'])?></p></td>   
              <td ><p align='center' ><?php echo $art['objcect']?></p></td>
              <td ><p align='center' ><?php echo $art['plan']?></p></td>
              <td ><p align='center' ><?php echo $art['region']?></p></td>
              <td ><p align='center' ><?php echo $art['strit']?></p></td>
              <td ><p align='center' ><?php echo $art['nhouse']?></p></td>
              <td ><p align='center' ><?php echo $art['level']?></p></td>
              <td ><p align='center' ><?php echo $art['levelage']?></p></td>
              <td ><p align='center' ><?php echo $art['periods']?></p></td>
              <td ><p align='center' ><?php echo $art['tel']?></p></td>
              <td ><p align='center' ><?php echo $art['meb']?></p></td>
              <td ><p align='center' ><?php echo $art['hol']?></p></td>
              <td ><p align='center' ><?php echo $art['tv']?></p></td>
              <td ><p align='center' ><?php echo $art['stir']?></p></td>
              <td ><p align='center' ><?php echo $art['norus']?></p></td>
              <td ><p align='center' ><?php echo $art['students']?></p></td>
              
              <td ><p align='center' ><?php  $user = Loged::getUser($art['users_idusers']); echo $user['login']; ?></p></td>
              <td ><p align='center' ><?php echo $art['price'] ?></p></td></tr>
               <tr> <td colspan='18' id='tit'><p align='left'><?php echo $art['text']; ?></p></td></tr>
                 
                    
           
               
                    
                    
                 
                <?php
            endwhile;
                ?>
            
    </table>
             
     
    <div id="side">
        
        <p>Да-да... Войдите!</p>
            <form method='post'>
                
                <p><b>Логин: </b><br /><input type='text' name='login'></p>
                <p><b>Пароль: </b><br /><input type='password' name='password'></p>
                <p><b>Запомнить: </b><input type='checkbox' name='thimy'></p>
                <p><input type='submit' class='button' name='autorised'></p>
                <p><a href="?register"> Регистрация</a> ||  <a href=""> Забыли пароль</a> </p>
            </form>
        
    </div>
    
</div>