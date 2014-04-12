<?php
/*
 * Класс работы со статьями
 */
class Article {
    //дата создания статьи
    static private $date_create = null;
    public static function NewArticle ($title, $description, $prew, $text, $keywords = null, $status, $userid){
        $db = DB::MySQLiConnect();
        self::$date_create = time();
        $date = self::$date_create;
        $sql_article = "INSERT INTO articles (title, description, keywords, prew, text, state, date_create, users_idusers)
                                 VALUE ('$title', '$description', '$keywords', '$prew', '$text', '$status', '$date', '$userid')";
        $query = $db->query($sql_article) or die("Ошибка при добавлении статьи".$db->error);
        return true;
    }
    /*
     * 
     * Вывод статей
     */
    public static function ShowArticle($limit = 5){
        $db = DB::MySQLiConnect();
        $sql_article = "SELECT idarticles, title, description, keywords, prew, text, state, date_create, date_edit, users_idusers
                FROM articles WHERE state = 1 ORDER BY date_create DESC LIMIT $limit";
        $query = $db->query($sql_article) or die("Ошибка при добавлении статьи".$db->error);
        return $query;
    }
    
    /*
     * 
     * Выборка статей по id
     */
    public static function ShowArticleId($id){
        $db = DB::MySQLiConnect();
        $sql = "SELECT idarticles, title, description, keywords, prew, text, state, date_create, date_edit, users_idusers
                FROM articles WHERE state = 1 AND idarticles = $id";
        $query = $db->query($sql) or die("Ошибка при добавлении статьи".$db->error);
        return $query;
    }
    
    /*
     * Удаление данных
     */
    public static function DeleteArticle($id_article){
        $db = DB::MySQLiConnect();
        $sql_delete_article = "DELETE FROM articles WHERE idarticles = $id_article";
        $db->query($sql_delete_article) or die($db->error);
        
        return true;
    }
    /*
     * Метод изменения статей
     */
    public static function UpdateArticle ($array) {
        $date_edit = time();
        $db = DB::MySQLiConnect();
        if(is_array($array)) { 
            //Изменяем данные
            
            $sql_update = "UPDATE articles SET title='".$array['title']."',description='".$array['description']
                    . "', keywords='".$array['keywords']."', prew='".$array['text_prw'].
                    "', text= '".$array['text']."', state='".$array['on']."', date_create='".
                    $array['date_create']."', date_edit= $date_edit WHERE idarticles = '".$array['id']."' ";
                   
            $query = $db->query($sql_update) or die($db->error);
            echo $array['text'];
            return true;
                    
        }
    }
    /*
     * Метод подсчёта статей
     */
    public static function CountToArticle(){
        $db = DB::MySQLiConnect();
        $sql_art = "SELECT COUNT(title) FROM articles";
        $query = $db->query($sql_art) or die($db->error); 
        $result = $query->fetch_row();
        
        return $result[0];
}
}