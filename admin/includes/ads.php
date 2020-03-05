<?php require_once('init.php'); ?>
<?php

class Ads extends Helper{

    protected static $db_table ="advertisement";
    public $id;
    public $name;
    public $position;
    public $ad_image_name;
    public $link;
    public $size_file;
    public $time_to;
    public $default_image_name;
    public $create_time;
    public $velicina;
    protected static $db_table_fields = array('name', 'position', 'ad_image_name', 'link','size_file', 'time_to');

    public $upload_directory = "ads-images";
    public $image_placeholder = 'http://placehold.it/200x200&text=image';

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


public function picturePath() {

    return $this->upload_directory . DS . $this->ad_image_name;
}


    public function imagePathPlaceholder() {

    return empty($this->ad_image_name) ? $this->default_image_name : $this->upload_directory . DS . $this->ad_image_name;
}


public function setFile($file) {

    if(empty($file) || !$file || !is_array($file)) {
        $this->errors[] = "There was no file uploaded here";
        return false;

    } elseif($file['error'] != 0 ) {

        $this->errors[] = $this->upload_errors[$file['error']];
        return false;
    
    } else {

        $bla = $file['name'];
        $this->ad_image_name = str_replace(" ","",$bla);
        $this->tmp_path =  $file['tmp_name'];
        $this->type =      $file['type'];
        $this->size =      $file['size'];

    }

}


public function save() {

    if($this->id) {

        $this->update();

    } else {
        
        if(!empty($this->errors)) {
            
            return false;

        }

        if(empty($this->news_image_name) || empty($this->tmp_path)) {

            $this->errors[] = 'the file was not available';
            
            return false;

        }

        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->ad_image_name;

        if(file_exists($target_path)) {

            $this->errors[] = "The file {$this->ad_image_name} already exists";
            return false;
        }

        if(move_uploaded_file($this->tmp_path, $target_path)) {
            
            if($this->create()) {
                unset($this->temp_path);
                return true;
            }

        } else {
            
            $this->errors[] = "the folder probably does not have permission";
            return false;
        }
        
    }

}



public function deletePhoto() {

    if($this->delete()) {

        $target_path = SITE_ROOT.DS. 'admin' . DS . $this->picturePath();
        redirect('advertisement.php');

        return unlink($target_path) ? true : false ;
    
    } else {

        return false;
    }
}


public function update() {

    global $database;

    $properties = $this->cleanProperties();
    $properties_pairs = array();

    foreach($properties as $key => $value) {

        $properties_pairs[] = "{$key}= '{$value}' ";
    }

    $sql = "UPDATE ". static::$db_table . " SET ";
    $sql.= implode(", ", $properties_pairs);
    $sql.= " WHERE id = '" . $database->escapeString($this->id) . " '; ";

    $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->ad_image_name;

    if(move_uploaded_file($this->tmp_path, $target_path)) {
            
        if($this->update()) {
            unset($this->temp_path);
            return true;
        }


        }
    
    $database->query($sql);

    return (mysqli_affected_rows($database->connection) == 1) ? true : false;
}

}
?>