<?php
require_once("db_class.php");
class New_student extends Db_class{
    public function __construct(){
        parent::__construct();
    }
    public function save_student($first_name,$last_name,$phone,$email,$matric_no,$gender,$dept_name){
         $stmt = $this->conn->query("SELECT dept_id FROM department_tb WHERE dept_name='$dept_name'");
        while($row=$stmt->fetch_assoc()){ 
            $test = $row['dept_id'];
            $stmt=$this->conn->query("SELECT * FROM student_tb WHERE matric_no='$matric_no'");
            if($stmt->fetch_assoc()){
                echo "Students record exists already!";
            }else{
                $stm = $this->conn->prepare("INSERT INTO student_tb (first_name,last_name,phone,email,matric_no,dept_id,gender) VALUES (?,?,?,?,?,?,?)");
                $stm->bind_param("sssssss",$first_name,$last_name,$phone,$email,$matric_no,$test,$gender);
                if($stm->execute()){
                    echo "save";    
                }
            }
        
        
        }
    }

}

?>