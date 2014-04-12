<?php

/* 
 * Определяет включена или отключена CMS
 */

class Shutdown {
    private $_status = null;
    private $_db;
    public function __construct($db) {
       try {
           if(is_object($db)){
               //Соединение с БД
               $this->_db = $db;
           }else{
               throw new GlobalErrors('Object NotFound');
           }
           if(!$this->getResultDB())
               throw new Exception("<senter><h3>Система временно отключена</h3></senter>");
      
           else {
               
           return true;}
           
           } catch (Exception $ex) {
                  die($ex->getMessage());         
           } catch(GlobalErrors $se) {
               die($se->getMessage());
           }
    }
    
    // Определение доступности системы
    private function getResultDB(){
        $sql_shutdown = "SELECT offline FROM settings";
        $query = $this->_db->query($sql_shutdown);
        $result = $query->fetch_row();
        if($result[0] == 1) 
            return true;
        else {
            return false;
        }
    }
}
$shutdown = new shutdown(DB::MySQLiConnect());