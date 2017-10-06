<?php
require_once("db_class.php");
class Nav extends Db_class{
    public $latitude;
    public $longitude;
    public function __construct(){
        parent::__construct();
    }

    
        public function navigate($venue){
           $stmt =  $this->conn->query("SELECT * FROM venue_tb WHERE name='$venue'");
            if($row =$stmt->fetch_Assoc()){
                $this->latitude = $row['latitude'];
                $this->longitude = $row['longitude'];
            }
            
    }
   
    }

?>