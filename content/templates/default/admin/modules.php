<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once MZ_ENGINE.'modules.php';
require_once MZ_ENGINE.'usermodules.php';

if($_GET['modules']){
    $mod_name = strip_tags(trim($_GET['modules']));
    try{
        if(!Module::activate($mod_name))
            throw new Exception('Модуль не активирован');
        else {
            echo "Модуль успешно активирован";
        }
    } catch (Exception $ex) {
        die($ex->getMessage());
    }
}
?>
<center>
    <div class="st">
        <h3>Системный модуль</h3>
        
    </div>
</center>

<table border="2" width="100%" style="background: #70FF00; padding: 5px;">
    <tr>
        <td style="padding: 5px;"><b>Имя модуля:</b></td><td style="padding: 5px;"><b>Путь:</b></td>
    </tr>
    <?php 
    foreach($modules as $k=>$v){
        echo "<tr><td style='padding: 5px;'>".$k."</td><td style='padding: 5px;'>".$v."</td></tr>";
    }
    ?>
</table>
<br /><hr /><br />
<table border="2" width="100%" style="background: #70FF00; padding: 5px;">
    <tr>
        <td style="padding: 5px;"><b>Имя модуля:</b></td><td style="padding: 5px;"><b>Путь:</b></td>
    </tr>
    <?php 
    foreach($user_mod as $k=>$v){
        $name = explode(".", $v);
        echo "<tr><td style='padding: 5px;'>".$name[0]."</td><td style='padding: 5px;'>".$v.
                "<td><a href='index.php?modules=$k'>Активировать</a></td></tr>";
    }
    ?>
</table>