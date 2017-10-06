<?php
require "config.php";

class Db_class{
    private $host=db_host;
    private $user=db_user;
    private $pass=db_pass;
    private $db_name=db_name;
    public $conn;
    public $myQuery;
    public function __construct(){
        $this->connect();
    }
    public function connect(){
        $this->conn=new mysqli($this->host, $this->user, $this->pass, $this->db_name);
        if(!$this->conn){
            echo "cant connect to database: ".$this->conn->connect_error;
            return false;
        }else{
            return true;
        }
    }
  
    
}

?>