<?php
require_once("db_class.php");
class New_staff extends Db_class{
    public function __construct(){
        parent::__construct();
    }
    public function save_staff($first_name,$last_name,$phone,$email,$status,$dept_name,$staff_no){
         $stmt = $this->conn->query("SELECT dept_id FROM department_tb WHERE dept_name='$dept_name'");
        while($row=$stmt->fetch_assoc()){ 
            $test = $row['dept_id'];
            
            $stmt=$this->conn->query("SELECT * FROM staff_tb WHERE staff_no='$staff_no'");
            if($stmt->fetch_assoc()){
                echo "Department exists already!";
            }else{
                $stm = $this->conn->prepare("INSERT INTO staff_tb (first_name,last_name,phone,email,status,dept_id,staff_no) VALUES (?,?,?,?,?,?,?)");
                $stm->bind_param("sssssss",$first_name,$last_name,$phone,$email,$status,$test,$staff_no);
                if($stm->execute()){
                    echo "save";    
                }
            }
        
        
        }
    }
    public function get_staff(){
        $data = $this->conn->query("SELECT * FROM staff_tb  WHERE status='lecturer'");
        while($row=$data->fetch_assoc()){
            echo "<option>".$row['first_name']." ".$row['last_name']."</option>";
             
        }
    }
    
         public function get_staff_filtered($dept_name){
        $stmt = $this->conn->query("SELECT dept_id FROM department_tb WHERE dept_name='$dept_name'");
        while($row = $stmt->fetch_assoc()){
            $test = $row['dept_id'];
            $data =  $this->conn->query("SELECT * FROM staff_tb WHERE dept_id='$test'");
            while($sql=$data->fetch_assoc()){
            echo "<option>".$sql['first_name']." ".$sql['last_name']."</option>";
            }
        }
        
    
    }
    
}

?>