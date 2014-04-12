<?php
/* 
 * Класс работы с таблицей публикуемых данных
 */
class Realtable {
    static private $date_create = null;
    public static function NewRec ($objcect, $plan, $region, $strit,
                $nhouse, $level, $levelage, $periods, $tel, $meb, $hol, $stir, $tv, $norus, $students, $price, $photo, $text ,$userid){
        $db = DB::MySQLiConnect();
        self::$date_create = time();
        $date = self::$date_create;
        $sql_article = "INSERT INTO realt (date, objcect, plan, region,
            strit, nhouse, level, levelage, periods, tel, meb, hol, stir, tv, norus, students, 
            price, photo , text, users_idusers)
            VALUE ('$date', '$objcect', '$plan', '$region', '$strit', '$nhouse', '$level', '$levelage', '$periods','$tel', '$meb', '$hol', '$stir', '$tv', '$norus', '$students', '$price', '$photo', '$text' , '$userid')";
        $query = $db->query($sql_article) or die("Ошибка при добавлении объявления".$db->error);
        return true;
    }
    public static function ShowRec ($lim = 10) {
        $db = DB::MySQLiConnect();
        $sql_article = "SELECT idd, date, objcect, plan, region,
            strit, nhouse, level, levelage, periods, tel, meb, hol, stir, tv, norus, students, 
            price, photo , text, users_idusers
                FROM realt ORDER BY date DESC LIMIT $lim";
        $query = $db->query($sql_article) or die("Ошибка при добавлении объявления".$db->error);
        return $query;
    }
    
    public static function ShowRecId ($id) {
        $db = DB::MySQLiConnect();
        $sql = "SELECT idd, date, objcect, plan, region,
            strit, nhouse, level, levelage, periods, tel, meb, hol, stir, tv, norus, students, 
            price, photo , text, users_idusers
                FROM realt WHERE idd = $id";
        $query = $db->query($sql) or die("Ошибка при добавлении объявления".$db->error);
        return $query;
    }
    
    public static function ShowRecUser($user){
        $db = DB::MySQLiConnect();
        $sql = "SELECT idd, date, objcect, plan, region,
            strit, nhouse, level, levelage, periods, tel, meb, hol, stir, tv, norus, students, 
            price, photo , text, users_idusers
                FROM realt WHERE users_idusers = $user";
        $query = $db->query($sql) or die("Ошибка при добавлении объявления".$db->error);
        return $query;
    }

    public static function DeleteRec ($id) {
         $db = DB::MySQLiConnect();
         $sql_delete_article = "DELETE FROM realt WHERE idd = $id";
        $db->query($sql_delete_article) or die($db->error);
        
        return true;
    }
    
    public static function UpdateRec ($arr) {
        $date_edit = time();
        $db = DB::MySQLiConnect();
        if(is_array($arr)) {
            $sql_update = "UPDATE realt SET date= $date_edit, objcect='".$arr['objcect']
                    . "', plan='".$arr['plan']."', region='".$arr['region'].
                    "', strit= '".$arr['strit']."', nhouse='".$arr['nhouse']."', level='".
                    $arr['level']."', levelage='".$arr['levelage']
                    . "', periods='".$arr['periods']."', tel='".$arr['tel'].
                    "', meb= '".$arr['meb']."', hol='".$arr['hol']."', stir='".
                    $arr['stir']."', tv='".$arr['tv']
                    . "', norus='".$arr['norus']."', students='".$arr['students'].
                    "', price= '".$arr['price']."', photo='".$arr['photo']."', text='".
                    $arr['text']."' WHERE idd = '".$arr['idd']."' ";
                   
            $query = $db->query($sql_update) or die($db->error);
            
            return true;
        }
    }
        
         public static function CountToArticle(){
        $db = DB::MySQLiConnect();
        $sql_art = "SELECT COUNT(objcect) FROM realt";
        $query = $db->query($sql_art) or die($db->error); 
        $result = $query->fetch_row();
        
        return $result[0];

    }
    
}