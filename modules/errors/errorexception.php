<?php

/* 
 * Обработка системных ошибок
 */
class GlobalErrors extends Exception{
    private $_errors = null;
    private $_error_code = null;
    
    function __construct($message = false, $code = false){
        $errors_message = array(
            'Object NotFound' => 'Переменная не является объектом',
            'Errors Session' => 'Ошибка при создании сессии',
            'Errors SendMail' => 'Ошибка при отправке сообщения'
        );
        $this->_errors = $errors_message[$message];
        $this->_error_code = $code;
    }
    public function setMessage(){
        return $this->_errors;
    }
    public function  setCode(){
        return $this->_error_code;
    }
}
