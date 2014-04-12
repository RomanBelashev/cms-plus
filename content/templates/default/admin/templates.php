<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/system/database/loged.php';

if($_POST) {
    $template = $_POST['template'];
    if($template == "") return false;
}

try{
    if(!Loged::ReturnTemplate($template))
        throw new Exception('Ошибка при смене шаблона');
    else {
        echo "Шаблон установлен";
    }
} catch (Exception $ex) {
   die($ex->getMessage());
}
?>
<center>
    <div class="st"><h3>Управление шаблонами сайта</h3></div>
    <form method="post">
        <?php
        $temp = scandir($_SERVER['DOCUMENT_ROOT'].'/content/templates');
        unset($temp[0]);
        unset($temp[1]);
        foreach ($temp as $tmp){
            echo $tmp."\n  <input type='radio' name='template' value='$tmp' />"; 
        }
        
        ?>
        <input type="submit" class="button" value="Выбрать" />
    </form>
    
</center>

