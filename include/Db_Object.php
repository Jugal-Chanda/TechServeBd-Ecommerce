<?php

class Db_Object {
    
    
    
    protected static $db_table = "";
    
    
    /*------------------------CRUD---------------------------*/
    
    //Read Fdorm Database
    public static function  find_all(){      
        $sql = "select * from ".static::$db_table.";";
        $result = static::findThisQuery($sql);
        return !empty($result)?$result:false;
        
    }
    
    
    public static function find_by_id($id){
        
        $sql = "select * from ".static::$db_table." where id = '$id' limit 1;";
        $result = static::findThisQuery($sql);
        return !empty($result)?array_shift($result):false;
        
    }
    
    
    
    public function save(){
        return isset($this->id)?$this->update():$this->create();
    }
    public function create(){
        global $db;
        $properties = $this->properties();
        //print_r($properties);
        $sql = "insert into ".static::$db_table." (".implode(",",array_keys($properties)).")";
        $sql.= "values('".implode("','",array_values($properties))."');";
        if($db->query($sql)){
            $this->id = $db->insert_id();
            echo "successfuly insert";
            return true;
        }
        
            
        
    }    
    
    public function update(){
        global $db;
        $properties = $this->properties();
        $properties_pair = array();
        
        foreach($properties as $key=>$value){
            $properties_pair[] = "{$key} = '{$value}'";
        }
        
        $sql = "update ".static::$db_table." set ";
        $sql.= implode(", ",$properties_pair);
        $sql .= "where id = '".$this->id."';";

        if($db->query($sql)){
            echo "successfuly update";
        }
        
        return ($db->conn->affected_rows == 1)?true:false;
        
        
    }
    
    public function delete(){
        global $db;
        $sql = "delete from ".static::$db_table." where id = '".$this->id."';";
        if($db->query($sql)){
            echo "successfuly delete";
        }
        
        return ($db->conn->affected_rows == 1)?true:false;
        
        
    }
    
    
    
    
    /** class helper method   **/
    protected static function findThisQuery($sql){
        global $db;
        $result = $db->query($sql);
        $librarians =  array();
        while($row = $result->fetch_assoc()) {
            $librarians[] = static::instantiation($row);
        }
        return $librarians;
        
    }
    private static function instantiation($row){
        $class_name =  get_called_class();
        $object  = new $class_name;
        /*$librarian->$id = $row['id'];
        $librarian->$name = $row['name'];
        $librarian->$email = $row['email'];
        $librarian->$phone = $row['phone'];
        $librarian->$password = $row['password'];*/  
        
        foreach($row as $key=>$value){
            if($object->has_the_attribuite($key)){
                $object->$key = $value;
            }else{
                die("{$key} is no attribuite of librarian");
            }
        }
        return $object;
    }
    
    private function has_the_attribuite($the_attribuite){
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribuite,$object_properties);
    }
    
    
    /***********************Find all properties of this objece ***************************/
    /*Call From CRUD methods */
    protected function properties(){
        //return get_object_vars($this);
        $properties = array();
        
        //print_r(static::$db_fields);
        foreach(static::$db_fields as $db_field){
            if(property_exists($this,$db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
            
    }
    
    protected function clean_properties(){
        global $db;
        
        $clean_properties = array();
        
        foreach($this->properties() as $key=>$value){
            $clean_properties[$key] = $db->escape_string($value);
        }
        return $clean_properties;
    }
    
    
    
    
    
}


?>