<?php require_once('init.php'); ?>

<?php

class Comment extends Helper {

    protected static $db_table ="comments";
    public $id;
    public $author;
    public $comment;
    public $news_id;
    public $create_time;
    protected static $db_table_fields = array('author', 'comment', 'news_id');




    public static function findByNewsId($id) {
          
        return  static::findThisQuery("SELECT * FROM " . static::$db_table . " WHERE news_id =" . $id);
    
    }


}//end of class





?>