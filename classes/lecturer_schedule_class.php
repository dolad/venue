<?php
if(!isset($_SESSION)){
session_start();
}
require_once("db_class.php");
class Lecturer_schedule extends Db_class{
    public function __construct(){
        parent::__construct();
    }
    public function set_course(){//Method identical with New_period::get_period(new_period.php)
        $staff_no = $_SESSION['staff_no'];
        $stm=$this->conn->query("SELECT * FROM period_tb");
        $period_num_rows = $stm->num_rows;
        $days = $this->conn->query("SELECT * FROM days_tb");
        $days_num_rows = $days->num_rows;
        $staff_id = $this->conn->query("SELECT * FROM staff_tb WHERE staff_no='$staff_no'");
        $id = $staff_id->fetch_assoc();
        $_staff_id = $id['staff_id'];
        for($n=1;$n<=$period_num_rows;$n++){
        $stmt2=$this->conn->query("SELECT * FROM period_tb WHERE period_id='$n'");
        $row2=$stmt2->fetch_assoc();
        $time = date('h:i A', strtotime($row2['start_time']));
        echo "<tr><td>".$time."</td>";
            for($m=1;$m<=$days_num_rows;$m++){
               $stmt=$this->conn->query("SELECT * FROM course_alloc_tb WHERE period_id='$n' AND days_id='$m' AND staff_id = '$_staff_id'");  
        if($row = $stmt->fetch_assoc()){
           $course = $row['course_id'];
            $venue = $row['venue_id'];
            $tests = $this->conn->query("SELECT c.course_name,v.name FROM course_tb AS c, venue_tb AS v WHERE c.course_id='$course' AND v.venue_id='$venue'");
            $test = $tests->fetch_assoc();
            echo "<td>".$test['course_name']."<br />".$test['name']."</td>";

        }else{
            echo "<td></td>";
        }
            }
        echo "</tr>";
        }

    }
    
   
    }

// $obj = new Alloc;
//$obj->set_course("COMPUTER SCI AND ENG.");
?>