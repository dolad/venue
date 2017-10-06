<?php
require_once("db_class.php");
class New_fac extends Db_class{
    public function __construct(){
        parent::__construct();
    }
    public function save_fac($fac_name){
        $stmt=$this->conn->query("SELECT * FROM faculty_tb WHERE faculty_name='$fac_name'");
            if($stmt->fetch_assoc()){
                echo "Faculty exists already!";
            }else{
        $stmt = $this->conn->prepare("INSERT INTO faculty_tb (faculty_name) VALUES (?)");
        $stmt->bind_param("s",$fac_name);
        $stmt->execute();
        header("Location:add_new_fac.php");
            }
    }
    public function get_fac(){
        $data = $this->conn->query("SELECT * FROM faculty_tb");
        while($row=$data->fetch_assoc()){
            echo "<option>".$row['faculty_name']."</option>";
             
        }
    }
    }

?>