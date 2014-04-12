<hr />
<p><b>Вы вошли как: <a href="?profile"><?php echo $_SESSION['users']['login']; ?></a></b></p>
|| <a href="?logout=<?php echo $_SESSION['users']['login']?>">Выход</a>

<?php
if($_SESSION['users']['login'] == "admin"):  ?>

<p><a href="admin.php">В админку</a></p>
<?php endif; ?>

<hr />
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