<?php require_once('init.php'); ?>
<?php

class News extends Helper{

    protected static $db_table = "news";
    public $id;
    public $title;
    public $body;
    public $category_id;
    public $news_image_name;
    public $type;
    public $size;
    public $create_time;
    protected static $db_table_fields = array('title', 'body', 'category_id', 'news_image_name','type', 'size');

    public $upload_directory = "images";
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

        return $this->upload_directory . DS . $this->news_image_name;
    }


        public function imagePathPlaceholder() {

        return empty($this->news_image_name) ? $this->image_placeholder : $this->upload_directory . DS . $this->news_image_name;
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
            $this->news_image_name = str_replace(" ","",$bla);
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

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->news_image_name;

            if(file_exists($target_path)) {

                $this->errors[] = "The file {$this->news_image_name} already exists";
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
            redirect('tables.php');

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

        $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->news_image_name;

        if(move_uploaded_file($this->tmp_path, $target_path)) {
                
            if($this->update()) {
                unset($this->temp_path);
                return true;
            }


            }
        
        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    public function categoryName($news_id) {

        global $database;

        $sql = "SELECT categories.name as name FROM " . static::$db_table .
        " JOIN categories 
        ON categories.id = category_id
        WHERE news.id = " . $news_id;

        $cat = $database->query($sql);
        $name = "";

        while($row = mysqli_fetch_array($cat)){

            $name =  $row['name'];
        }
        
    return $name;
    }


    public static function countComments($id) {

        global $database;

        $sql = "SELECT COUNT(*)  AS numberOfComments FROM comments  WHERE news_id= " . $id;
  
          $rs = $database->query($sql);
          $row = mysqli_fetch_array($rs);

          return $row['numberOfComments'];
    }



    public static function findByCategory($id){

        if($id == 0){
            return static::findAll();
        }else {
            return  static::findThisQuery("SELECT * FROM " . static::$db_table . " WHERE category_id = " . $id . " ORDER BY create_time desc");
        }
        
      }


      public static function withMostComments(){

        return  static::findThisQuery("SELECT *, count(*) as count FROM comments c LEFT JOIN news n 
        ON c.news_id = n.id
        GROUP BY c.news_id 
        ORDER BY count DESC, n.create_time DESC
        LIMIT 4");
      }

} //End of class

?>