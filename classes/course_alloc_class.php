<?php
require_once("db_class.php");
class Alloc extends Db_class{
    public function __construct(){
        parent::__construct();
    }
    public function set_course($c_dept){//Method identical with New_period::get_period(new_period.php)
        $stm=$this->conn->query("SELECT * FROM period_tb");
        $period_num_rows = $stm->num_rows;
        $days = $this->conn->query("SELECT * FROM days_tb");
        $days_num_rows = $days->num_rows;
        $dept_id = $this->conn->query("SELECT * FROM department_tb WHERE dept_name='$c_dept'");
        $id = $dept_id->fetch_assoc();
        $_dept_id = $id['dept_id'];
        for($n=1;$n<=$period_num_rows;$n++){
        $stmt2=$this->conn->query("SELECT * FROM period_tb WHERE period_id='$n'");
        $row2=$stmt2->fetch_assoc();
        $time = date('h:i A', strtotime($row2['start_time']));
        echo "<tr><td>".$time."</td>";
            for($m=1;$m<=$days_num_rows;$m++){
               $stmt=$this->conn->query("SELECT * FROM course_alloc_tb WHERE period_id='$n' AND days_id='$m' AND dept_id = '$_dept_id'");  
        if($row = $stmt->fetch_assoc()){
           $course = $row['course_id'];
            $venue = $row['venue_id'];
            $staff = $row['staff_id'];
            $tests = $this->conn->query("SELECT c.course_name,v.name,s.first_name,s.last_name FROM course_tb AS c, venue_tb AS v,staff_tb AS s WHERE c.course_id='$course' AND v.venue_id='$venue' AND s.staff_id='$staff'");
            $test = $tests->fetch_assoc();
            echo "<td>".$test['course_name']."<br />".$test['name']."<br />".$test['first_name']." ".$test['last_name']."</td>";

        }else{
            echo "<td></td>";
        }
            }
        echo "</tr>";
        }

    }
    
        public function set_course_by_venue($venue){
        $stm=$this->conn->query("SELECT * FROM period_tb");
        $period_num_rows = $stm->num_rows;
        $days = $this->conn->query("SELECT * FROM days_tb");
        $days_num_rows = $days->num_rows;
        $venue_id = $this->conn->query("SELECT * FROM venue_tb WHERE name='$venue'");
        $id = $venue_id->fetch_assoc();
        $_venue_id = $id['venue_id'];
        for($n=1;$n<=$period_num_rows;$n++){
        $stmt2=$this->conn->query("SELECT * FROM period_tb WHERE period_id='$n'");
        $row2=$stmt2->fetch_assoc();
        $time = date('h:i A', strtotime($row2['start_time']));
        echo "<tr><td>".$time."</td>";
            for($m=1;$m<=$days_num_rows;$m++){
               $stmt=$this->conn->query("SELECT * FROM course_alloc_tb WHERE period_id='$n' AND days_id='$m' AND venue_id = '$_venue_id'");  
        if($row = $stmt->fetch_assoc()){
           $course = $row['course_id'];
            $venue = $row['venue_id'];
            $staff = $row['staff_id'];
            $tests = $this->conn->query("SELECT c.course_name,v.name,s.first_name,s.last_name FROM course_tb AS c, venue_tb AS v,staff_tb AS s WHERE c.course_id='$course' AND v.venue_id='$venue' AND s.staff_id='$staff'");
            $test = $tests->fetch_assoc();
            echo "<td>".$test['course_name']."<br />".$test['name']."<br />".$test['first_name']." ".$test['last_name']."</td>";

        }else{
            echo "<td></td>";
        }
            }
        echo "</tr>";
        }

    }
   
    }
//idea .... use days_id to traverse down the table for proper positioning of the courses.
// $obj = new Alloc;
//$obj->set_course("COMPUTER SCI AND ENG.");
?>