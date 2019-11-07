<?php

include("config.php");

class Database {
    public $conn;
    private $servername ;
    private $username ;
    private $password ;
    private $dbname ;
    function __construct ($servername,$username,$password,$dbname){
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        self::open_db_connection();
    }
    
    public function open_db_connection(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
    
    public function query($sql){
        $result = $this->conn->query($sql);
        $this->confirm_query($result);
        return $result;
    }
    private function confirm_query($result) {
        if(!$result){
            die("query failed".$this->conn->error);
        }
    }
    public function escape_string($string){
        return $this->conn->real_escape_string($string);
    }
    public function insert_id(){
        return $this->conn->insert_id;
    }
}

$db = new Database($servername,$username,$password,$dbname);


?>