<?php

class Helper {


    public static function findAll(){

        return  static::findThisQuery("SELECT * FROM " . static::$db_table . " ");
      }


      public static function findFromTo($from, $numberOfNews){

        return  static::findThisQuery("SELECT * FROM " . static::$db_table . " ORDER BY create_time DESC limit " . $from . "," . $numberOfNews);
      }
  
  
      public static function findById($id){
          
          $sql = "SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1";
  
          $the_result_array = static::findThisQuery($sql);
  
          return !empty($the_result_array) ? array_shift($the_result_array) : false;
      }


      public static function findThisQuery($sql){

        global $database;
        $resultSet = $database->query($sql);
        $the_object_array = array();

        while($row = mysqli_fetch_array($resultSet)){

            $the_object_array[] = static::instantation($row);
        }

        return $the_object_array;
    }


    public static function instantation($the_record){

        $calling_class = get_called_class();
        $the_object = new $calling_class;

        foreach($the_record as $the_attribute => $value){

            if($the_object->hasTheAttribute($the_attribute)){

                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }


    private function hasTheAttribute($the_attribute){

        $object_properties = get_object_vars($this);
        
        return array_key_exists($the_attribute, $object_properties);
    }


    public function save() {

        return isset($this->id) ? $this->update() : $this->create();
    }


    public function create() {

        global $database;
        $properties = $this->cleanProperties();

        $sql = "INSERT INTO " . static::$db_table ." (" . implode(", " , array_keys($properties)) .") ";
        $sql .= "VALUES ('". implode("','" , array_values($properties)) . "')";
        
        if($database->query($sql)){

            $this->id = $database->insertID();

            return true;

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
        
        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    public function delete() {

        global $database;

        $sql = "DELETE from ". static::$db_table . " WHERE id = '" . $database->escapeString($this->id) . " '; ";

        $database->query($sql);
        

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    public function properties() {

        $properties = array();

        foreach(static::$db_table_fields as $db_field) {

            if(property_exists($this, $db_field)){

                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }


    protected function cleanProperties() {

        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            
            $clean_properties[$key] = $database->escapeString($value);
        }
        return $clean_properties;
    }

}



?>