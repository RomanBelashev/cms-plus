<?php
/* 
 * Модуль управления шаблонами
 */
class Templater {  
    private $path, $dir, $db;
    public $t;
    // Определяем полный путь к каталогу с шаблонами
    public function __construct() {  
        $this->dir = 'templates/';
        $this->path = DIR_CONTENT.$this->dir;
        $this->db = DB::MySQLiConnect();
        $this->t = $this->thisTemplater();
    }
    //Передаём два параметра, имя каталога текущего шаблона ($tmp) - Имя шаблона (index.php)
private function getParse($tmp,$file){
    
}
//Определение текущего шаблона
    private  function thisTemplater(){
        try{
            $sql_template = 'SELECT tmp FROM settings'; 
            $query = $this->db->query($sql_template);
            if(!$query) {throw new Exception('Ошибка при выборе шаблона');}
            $result = $query->fetch_row();
            
            return $result[0];
        } catch (Exception $ex) {
               return $ex->getMessage();
        }
    }
    
    
    // Список шаблонов в каталоге
    
    public function AllTemplater(){
        $tmp = scandir($this->path);
        //отсекаем лишнее
        $templater = Simple::topZero($tmp);
        foreach($templater as $temp){
            echo $temp;
    }
    }
    //Вывод текущего шаблона на экран
    
    public function ShowTemplate(){
        //Определяем текущий шаблон
        $tmp = $this->thisTemplater();
        //проверяем сессию
        if(!Session::authtrue()){ 
            include_once $this->path.$tmp.'/index.php';
        }  else {
            // Подключаем шаблон авторизированному юзеру
            include_once $this->path.$tmp.'/users/index.php';
        }
    }
}
$templater = new Templater();
echo $templater->ShowTemplate();