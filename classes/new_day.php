<?php
require_once("db_class.php");
class New_day extends Db_class{
    public function __construct(){
        parent::__construct();
    }
    public function save_day($day){
        $this->myQuery = $this->conn->prepare("INSERT INTO days_tb (day) VALUES (?)");
        $this->myQuery->bind_param("s",$day);
        $this->myQuery->execute();
    }
    public function get_day(){
        $stmt = $this->conn->query("SELECT * FROM days_tb");
        while($row=$stmt->fetch_assoc()){
            echo "<th>".$row['day']."</th>";
        }
    }
   
    }

?>