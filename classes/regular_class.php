<?php
require_once("db_class.php");
class Regular extends Db_class{
    public function __construct(){
        parent::__construct();
    }
    public function get_courses(){
        $stmt = $this->conn->query("SELECT * FROM course_tb")
    }
   
    }

?>