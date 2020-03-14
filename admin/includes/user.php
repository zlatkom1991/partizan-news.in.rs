<?php 
require_once('helper.php');
class User extends Helper {

    protected static $db_table ="users";
    public $id;
    public $username;
    public $password;
    public $slika;
    // public $first_name;
    // public $last_name;
    // public $user_image;
    // public $upload_directory = "images";
    // public $image_placeholder = 'http://placehold.it/200x200&text=image';
    protected static $db_table_fields = array('username', 'password', 'slika');

    public $errors = array();
    public $upload_errors = array(

        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"

    );


    public static function verifyUser($username, $password) {
    
        global $database;

        $username = $database->escapeString($username);
        $password = $database->escapeString($password);

        $sql = "SELECT * FROM " . self::$db_table . " where username = '{$username}'";

        $user_found = self::findThisQuery($sql);

        return password_verify($password, $user_found[0]->password) ? array_shift($user_found) : false;

    }



} //End of class

?>
