<?php
/*
 * Класс установки cms
 */
// Подключаем нужные файлы
require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once DIR_ENGINE.'system/entity/simple.php';
require_once DIR_ENGINE.'system/errors/global.php';

class install {
    
    public $connect;
    public function __construct() {
        $this->connect = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
        
        
        if (!$this->connect){ 
            die('Connect Error ('.$this->connect->connect_errno.')'.$this->connect->connect_error); 
        } else echo "соед есть";

    }
    public function  show (){
        if(file_exists(DIR_INCLUDES.'config.mzz.php'))
                return false;
        
            include_once DIR_ENGINE.'install/header.php';
            include_once DIR_ENGINE.'install/ok.php';
            include_once DIR_ENGINE.'install/footer.php';
    }
    
    public function createFile($database, $user, $password, $host){
     
    try {
       
      $result = "
          <?php
          define('DB_HOST', '$host');\n
          define('DB_USER', '$user');\n
          define('DB_PASSWORD', '$password');\n
          define('DB_DATABASE', '$database');\n
              ?>
";
      if(!file_exists(DIR_INCLUDES.'config.db.php')){
          if(!@file_put_contents(DIR_INCLUDES.'config.db.php', $result))
                  throw new Exception(Errors::installError('errorFiles'));
      }
      return true;
    }  catch (Exсeption $e){
        return $e->getMessage();
    }
    }
    
    public function  start($adminemail, $admin){
        try {
            
            // Устанавливаем БД
            if(!$this->newDB())
            {throw new Exception(Errors::installError('errorDB').$this->newDB());}
           // Заливаем таблицу 
            if(!$this->TableMzLiteCms())
            { throw new Exception(Errors::installError('errorTableDB'));}
            
            //Создаём администратора
          $login = Simple::getClearDB($this->connect,$admin[0]);
          $email = Simple::getClearDB($this->connect,$admin[1]);
          $password  = $admin[2];
          if(!$this->newAdmin($login, $email, $password))
          { throw new Exception(Errors::installError('errorUsers'));}
                    
            //Создаём файл конфигурации админа
          if(!file_exists(DIR_INCLUDES.'config.mzz.php')){ 
              $filesarray = array("<?php \n define('ADMIEMAIL', '$adminemail');\n?>");
              $file = @file_put_contents(DIR_INCLUDES.'config.mzz.php', $filesarray); //создаётся файл
              if(!$file) 
              throw new Exception(Errors::installError('errorFiles'));
             
              return;
              
          }
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
    
    private function  newDB(){
        
        // Проверяем, существует ли БД
        $db = $this->connect->query("SHOW DATABASES LIKE '".DB_DATABASE."'");
        //Если БД нет, то создаём
        if(!empty($db)) {
            
            if($this->connect->query("SHOW DATABASE IF NOT EXISTS ".DB_DATABASE."")){
                   echo "Пожалуйста, измените файл config.db.php и замените строку 
                       define ('DB_DATABASE', '');
                       на 
                       define ('DB_DATABASE', DB_DATABASE)";
            }
        }
        else { 
            //Записываем данные от ошибке  в создаваемый файл вместе с полезными константами
            if(@file_put_contents(DIR_ENGINE.'install/errors/errors.dat', 
                    $this->connect->error.__FILE__.__LINE__."\n" )) {
            die(Errors::installError('errorsFileDB'));
            
            
                    }
        }
        return true;
    }
    
    public function  TableMzLiteCms(){
        //Если БД существует, создаём таблицы
        $sql = $this->connect;
        
        $this->connect->query('set names utf8');
        $this->connect->query("SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0");
        
        $sql->query("SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL'");
        $sql->query("CREATE SCHEMA IF NOT EXISTS" .DB_DATABASE. "DEFAULT CHARACTER SET utf8");


   $users = $sql->query("
CREATE  TABLE IF NOT EXISTS " .DB_DATABASE. ".`users` (
  `idusers` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(85) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(85) NOT NULL ,
  `role` TINYINT NOT NULL DEFAULT 0 ,
  
  PRIMARY KEY (`idusers`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci")or die("Error in sql: <br>$sql->error<br>");
     
  $articles = $sql->query("
CREATE  TABLE IF NOT EXISTS " .DB_DATABASE. ".`articles` (
  `idarticles` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(85) NOT NULL ,
  `keywords` VARCHAR(85) NOT NULL ,
  `text` TEXT NOT NULL ,
  `state` TINYINT NOT NULL DEFAULT '0' COMMENT '0 - черновик, 1 - опубликовано' ,
  `date_create` VARCHAR(45) NOT NULL COMMENT 'дата создания' ,
  `date_edit` VARCHAR(45) NOT NULL COMMENT 'дата изменения' ,
  `users_idusers` INT NOT NULL ,
  PRIMARY KEY (`idarticles`) ,
  INDEX `fk_articles_users1` (`users_idusers` ASC) ,
  CONSTRAINT `fk_articles_users1`
    FOREIGN KEY (`users_idusers` )
    REFERENCES ".DB_DATABASE.".`users` (`idusers` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci")or die("Error in sql: <br>$sql->error<br>");
      
        
        $rols = $sql->query("
CREATE  TABLE IF NOT EXISTS " .DB_DATABASE. ".`rols` (
  `idrols` INT NOT NULL AUTO_INCREMENT ,
  `roleid` TINYINT(4) NOT NULL COMMENT 'роль юзера - 1,2,3,4' ,
  `textrole` VARCHAR(45) NOT NULL ,
  `users_idusers` INT NOT NULL ,
  PRIMARY KEY (`idrols`, `users_idusers`) ,
  INDEX `fk_rols_users` (`users_idusers` ASC) ,
  CONSTRAINT `fk_rols_users`
    FOREIGN KEY (`users_idusers`)
    REFERENCES ".DB_DATABASE.".`users` (`idusers` )
      ON DELETE NO ACTION
    ON UPDATE NO ACTION  )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci") or die("Error in sql: <br>$sql->error<br>");

$settings = $sql->query("
CREATE  TABLE IF NOT EXISTS " .DB_DATABASE. ".`settings` (
  `idsettings` INT NOT NULL ,
  `access` TINYINT NOT NULL DEFAULT 1 ,
  `offline` TINYINT NOT NULL DEFAULT 1 ,
  `editor` TINYINT NOT NULL DEFAULT 1 ,
  `modules` TINYINT NOT NULL DEFAULT 1 COMMENT '0 - выкл»' )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci")or die("Error in sql: <br>$sql->error<br>");

$files = $sql->query("
CREATE  TABLE IF NOT EXISTS " .DB_DATABASE. ".`files` (
  `idfiles` INT NOT NULL AUTO_INCREMENT ,
  `path` VARCHAR(45) NOT NULL ,
  `extension` VARCHAR(45) NOT NULL ,
  `type` VARCHAR(45) NOT NULL COMMENT 'тип изображения миме' ,
  `users_idusers` INT NOT NULL ,
  PRIMARY KEY (`idfiles`) ,
  INDEX `fk_files_users1` (`users_idusers` ASC) ,
  CONSTRAINT `fk_files_users1`
    FOREIGN KEY (`users_idusers` )
    REFERENCES ".DB_DATABASE.".`users` (`idusers` )
     ON DELETE NO ACTION
    ON UPDATE NO ACTION   )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci")or die("Error in sql: <br>$sql->error<br>");


$widgets = $sql->query("
CREATE  TABLE IF NOT EXISTS " .DB_DATABASE. ".`widgets` (
  `idwidgets` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(55) NOT NULL ,
  `head` VARCHAR(255) NOT NULL COMMENT 'заголовок модуля' ,
  `template` VARCHAR(105) NOT NULL COMMENT 'имя шаблона или путь к нему' ,
  PRIMARY KEY (`idwidgets`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci")or die("Error in sql: <br>$sql->error<br>");


$errors = $sql->query("
CREATE  TABLE IF NOT EXISTS " .DB_DATABASE. ".`errors` (
  `iderrors` INT NOT NULL AUTO_INCREMENT ,
  `module` VARCHAR(45) NOT NULL COMMENT 'модуль, в котором произошла ошибка' ,
  `message` TEXT NOT NULL ,
  PRIMARY KEY (`iderrors`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci")or die("Error in sql: <br>$sql->error<br>");

$realt = $sql->query("CREATE TABLE IF NOT EXISTS " .DB_DATABASE. ".`realt` (
  `idd` int(8) NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `objcect` varchar(255) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `strit` varchar(255) NOT NULL,
  `nhouse` varchar(8) NOT NULL,
  `level` int(2) NOT NULL,
  `levelage` int(2) NOT NULL,
  `periods` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `meb` varchar(255) NOT NULL,
  `hol` varchar(255) NOT NULL,
  `stir` varchar(255) NOT NULL,
  `tv` varchar(255) NOT NULL,
  `norus` varchar(255) NOT NULL,
  `students` varchar(255) NOT NULL,
  `users_idusers` INT NOT NULL ,
  `price` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`idd`) ,
  INDEX `fk_realt_users1` (`users_idusers` ASC) ,
  CONSTRAINT `fk_realt_users1`
    FOREIGN KEY (`users_idusers` )
    REFERENCES ".DB_DATABASE.".`users` (`idusers` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci")or die("Error in sql: <br>$sql->error<br>");


$sql->query("SET SQL_MODE=@OLD_SQL_MODE");
$sql->query("SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS");
$sql->query("SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS");

if(!$rols) return false;
if(!$users) return false;
if(!$articles) return false;
if(!$errors) return false;
if(!$files) return false;
if(!$settings) return false;
if(!$widgets) return false;  
if(!$realt) return false;
 
return true;
    }
    
    private function newAdmin($login, $email,$password){
        
        $db = $this->connect;
        $insert_admin = "INSERT INTO users (login, email, password, role)
            VALUES ('$login', '$email', '$password', 3)";
        $result = $db->query($insert_admin);
        if(!$result) return FALSE;
        
        return true;
    }
}
?>
