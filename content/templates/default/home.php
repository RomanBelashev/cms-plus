<section id="middle">
    
    <div id="container">
        <div id="content">
            <center>
                <?php
                //работа со статьями
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
                            <a href="?article=<?php echo $art['idarticles']; ?>">Читать далее</a>
                        </td>
                    </tr>
                </table>
                <?php
            endwhile;
                ?>
            </center>
        </div><!--#content -->
    
    <aside id="sideRight">
        
            <h4>Вход на сайт</h4><br />
            <form method='post'>
                <p><b>Логин: </b><br /><input type='text' name='login'></p>
                <p><b>Пароль: </b><br /><input type='password' name='password'></p>
                <p><b>Запомнить: </b><input type='checkbox' name='thimy'></p>
                <p><input type='submit' class='button' name='autorised'></p>
                <p><a href="?register"> Регистрация</a> ||  <a href=""> Забыли пароль</a> </p>
            </form>
        
    </aside><!--#sideRight-->
    
    </div><!--#container -->
</section>