<?php require_once('init.php'); ?>
<?php

class Category extends Helper{

    protected static $db_table ="categories";
    public $id;
    public $name;
    protected static $db_table_fields = array('name');


}

?>