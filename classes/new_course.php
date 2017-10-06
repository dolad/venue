<?php
require_once("db_class.php");
class New_course extends Db_class{
    public function __construct(){
        parent::__construct();
    }
    public function save_course($course_name,$dept_name){
         $stmt = $this->conn->query("SELECT dept_id FROM department_tb WHERE dept_name='$dept_name'");
        while($row=$stmt->fetch_assoc()){ 
            $test = $row['dept_id'];
            
            $stmt=$this->conn->query("SELECT * FROM course_tb WHERE course_name='$course_name'");
            if($stmt->fetch_assoc()){
                echo "Course exists already!";
            }else{
                $stm = $this->conn->prepare("INSERT INTO course_tb (course_name,dept_id) VALUES (?,?)");
                $stm->bind_param("si",$course_name,$test);
                $stm->execute();
            }
        
        
        }
        header("Location:add_new_fac.php");
    }
    
     public function get_course_filtered($dept_name){
        $stmt = $this->conn->query("SELECT dept_id FROM department_tb WHERE dept_name='$dept_name'");
        while($row = $stmt->fetch_assoc()){
            $test = $row['dept_id'];
            $data =  $this->conn->query("SELECT course_name FROM course_tb WHERE dept_id='$test'");
            while($sql=$data->fetch_assoc()){
            echo "<tr><td class='draggable'>".$sql['course_name']."</td></tr>";
            }
        }
        
    
    }

}

?>
