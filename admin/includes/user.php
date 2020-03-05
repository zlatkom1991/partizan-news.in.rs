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

        $sql = "SELECT * FROM " . self::$db_table . " where username = '{$username}' AND password = '{$password}'";

        $user_found = self::findThisQuery($sql);

        return !empty($user_found) ? array_shift($user_found) : false;

    }


    // public function imagePathPlaceholder() {

    //     return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
    // }


    // public function setFile($file) {

    //     if(empty($file) || !$file || !is_array($file)) {
    //         $this->errors[] = "There was no file uploaded here";
    //         return false;

    //     } elseif($file['error'] != 0 ) {

    //         $this->errors[] = $this->upload_errors[$file['error']];
    //         return false;
        
    //     } else {
 
    //         $this->user_image = $file['name'];
    //         $this->tmp_path =  $file['tmp_name'];
    //         $this->type =      $file['type'];
    //         $this->size =      $file['size'];

    //     }

    // }


    // public function saveUserAndImage() {

    //     if($this->id) {

    //         $this->update();

    //     } else {
            
    //         if(!empty($this->errors)) {
                
    //             return false;

    //         }

    //         if(empty($this->user_image) || empty($this->tmp_path)) {

    //             $this->errors[] = 'the file was not available';
                
    //             return false;

    //         }

    //         $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

    //         if(file_exists($target_path)) {

    //             $this->errors[] = "The file {$this->user_image} already exists";
    //             return false;
    //         }

    //         if(move_uploaded_file($this->tmp_path, $target_path)) {
                
    //             if($this->create()) {
    //                 unset($this->temp_path);
    //                 return true;
    //             }

    //         } else {
                
    //             $this->errors[] = "the folder probably does not have permission";
    //             return false;
    //         }
            
    //     }

    // }


} //End of class

?>