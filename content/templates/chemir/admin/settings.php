<?php 
if($_POST['settings']){
    $status = $_POST['offline'];
    $editor = $_POST['editor'];
    
    if($status == "on"){
        $status = 1;
    }else{
        $status = 0;
    }
    if($editor == "on"){
        $editor = 1;
    }else{
        $editor = 0;
    }
    try{
        if(!Loged::settings($status,$editor))
        throw new Exception("Ошибка при изменении параметров");
           else  echo "Параметры успешно изменены";
    } catch (Exception $ex) {
    die($ex->getMessage());
    }
}

?>

<div class="res">
    <div class="st"><b>Глобальные настройки cms</b></div>
    
    <form method="post">
        <fieldset class="off">
            <legend><b>Состояние системы:</b></legend>
            <table>
                <tr>
                    <td>Включена: </td><td><input type="radio" name="offline" value="on" checked /></td>
                </tr>
                <tr>
                    <td>Отключена: </td><td><input type="radio" name="offline" value="off" /></td>
                </tr>
            </table>
        </fieldset>
        <fieldset class="editor">
            <legend><b>Текстовый редактор:</b></legend>
            <table>
                <tr>
                    <td>Включен: </td><td><input type="radio" name="editor" value="on" checked /></td>
                </tr>
                <tr>
                    <td>Отключён: </td><td><input type="radio" name="editor" value="off" /></td>
                </tr>
            </table>
        </fieldset>
        
        <br /><hr /><br />
        <p style="text-align: center;">
            <input type="submit" class="button" name="settings" value="Изменить"></p>
        <hr /> <!--черта -->
    
    </form>
    
</div>
