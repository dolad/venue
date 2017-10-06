<?php
require_once("db_class.php");
class New_dept extends Db_class{
    public function __construct(){
        parent::__construct();
    }
    public function save_dept($fac_name,$dept_name){
         $stmt = $this->conn->query("SELECT faculty_id FROM faculty_tb WHERE faculty_name='$fac_name'");
        while($row=$stmt->fetch_assoc()){ 
            $test = $row['faculty_id'];
            
            $stmt=$this->conn->query("SELECT * FROM department_tb WHERE dept_name='$dept_name'");
            if($stmt->fetch_assoc()){
                echo "Department exists already!";
            }else{
                $stm = $this->conn->prepare("INSERT INTO department_tb (faculty_id,dept_name) VALUES (?,?)");
                $stm->bind_param("is",$test,$dept_name);
                if($stm->execute()){
                    header("Location:add_new_fac.php");
                   // echo "saved";    
                }
            }
        
        
        }
    }
    public function get_dept(){
        $data = $this->conn->query("SELECT * FROM department_tb");
        while($row=$data->fetch_assoc()){
            echo "<option>".$row['dept_name']."</option>";
             
        }
    }
    public function get_dept_filtered($fac_name){
        $stmt = $this->conn->query("SELECT faculty_id FROM faculty_tb WHERE faculty_name='$fac_name'");
        while($row = $stmt->fetch_assoc()){
            $test = $row['faculty_id'];
            $data =  $this->conn->query("SELECT dept_name FROM department_tb WHERE faculty_id='$test'");
            while($sql=$data->fetch_assoc()){
            echo "<option>".$sql['dept_name']."</option>";
            }
        }
        
    
    }
}

?>