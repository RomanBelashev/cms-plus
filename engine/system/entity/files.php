<?php

/* 
 * Управление файлами
 */
class MediaContent {
    //Загрузка файлов
    public function newFiles($name, $tmp_name){
        //Обрубаем все файлы с опасным расширением
        $path = array(".php", ".php4", ".php3", ".phtml", ".pl"); // список можно увеличить
        foreach ($path as $item){
            if(preg_match("/$item\$/i", $name)) {
                exit('Тип файла не поддерживается для загрузки');
            }
        }
        //Определение директории
        $dir = 'files/';
        $file = $dir.basename($name);
        
        if(move_uploaded_file($tmp_name, $file)) return true;
        else {return false;}
    }
    
    /*
     * Получение расширения файла
     */
    public function extendsFiles($file){
        return substr(strchr($file, '.'),1);
    }
}
