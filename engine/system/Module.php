<?php
/*
 * 
 * Главный файл модулей
 */

class Module {
    // Список всех модулей (array)
    
    private static  $module;
    // Список активированных модулей
    private static  $activate;
    // активация модулей cms системы
    public static function activate ($module_name) {
        // Активируем необходимые модули для движка ядра
        if($module_name == 'Module'){
            
            self::$module = array();
            self::$activate = array();
            
            self::LoadConfigSystem(DIR_ENGINE.'modules.php', DIR_MODULES);
            
            //Активация нужных модулей
            self::activate('GlobalErrors');
            self::activate('UserErrors');
            //Модуль почты
            self::activate('Mail');
        } 
        elseif ($module_name == 'UserErrors') {
            // если включена работа со сторонними модулями
        
    }   else {
        
        // активация любых других модулей
        self::LoadConfigSystem(DIR_ENGINE.'usermodules.php', DIR_MODULES.'usermodule/');
        // Проверка, существует ли модуль
        if(!isset(self::$module[$module_name])){
        throw new UserErrors ('Модуль %s не установлен', $module_name);}
        else {
            // Подключаем модуль
            require_once self::$module[$module_name];
            // Заносим в массив активированных модулей
            self::$activate[] = $module_name;
           
            // проверяем, точно ли существует метод и установлена система
            // метод system должен прописан во всех модулях
            if(MzLite::$install && method_exists($module_name, 'system')) {
                 
                // Активация модуля с помощью функции php, которая регистрирует метод или функцию
                
                call_user_func(array($module_name, 'system'));
            }
        }
        return true;
    }
        
    /*
     * *
     *Метод подключения
     * config_module - файл с модулями
     * basedir - Каталог с модулями
     */
    
    
    }
    
    private static function LoadConfigSystem($config_module, $basedir){
    require_once $config_module;
    if(isset($modules)){ 
        foreach ($modules as $name=>$path){
            //Получаем имя модуля(индекс) + путь к модулю(ключ)
            self::$module[$name] = $basedir.$path;
        }
    }
    if(isset($user_mod)){ 
        foreach ($user_mod as $name=>$path){
            //Получаем имя модуля(индекс) + путь к модулю(ключ)
            self::$module[$name] = $basedir.$path;
        }
    }
    
}
}
?>
