<?php
require_once("db_class.php");
class New_period extends Db_class{
    public function __construct(){
        parent::__construct();
    }
    public function save_period($start,$end){
        $stmt = $this->conn->prepare("INSERT INTO period_tb (start_time,end_time) VALUES (?,?)");
        $stmt->bind_param("ss",$start,$end);
        $stmt->execute();
        header("Location:add_new_fac.php");
    }
    public function get_period($c_dept){//Method identical with Alloc::set_course(course_alloc_class.php)
        $stmt=$this->conn->query("SELECT * FROM period_tb");
        $days = $this->conn->query("SELECT * FROM days_tb");
        $course_alloc = $this->conn->query("SELECT * FROM course_alloc_tb");
        $days_num_rows = $days->num_rows;
        $period_num_rows = $stmt->num_rows;
        $alloc_num_rows = $course_alloc->num_rows;
        $dept_id = $this->conn->query("SELECT * FROM department_tb WHERE dept_name='$c_dept'");
        $id = $dept_id->fetch_assoc();
        $_dept_id = $id['dept_id'];
        for($n=1;$n<=$period_num_rows;$n++){
        $stmt2=$this->conn->query("SELECT * FROM period_tb WHERE period_id='$n'");
        $row2=$stmt2->fetch_assoc();
        $time = date('h:i A', strtotime($row2['start_time']));
        echo "<tr><td>".$time."</td>";
                for($m=1;$m<=$days_num_rows;$m++){
                    $courseStmt = $this->conn->query("SELECT * FROM course_alloc_tb WHERE days_id='$m' AND period_id='$n' AND dept_id = '$_dept_id'");
                    if($theCourse =$courseStmt->fetch_assoc()){
                        $course_id = $theCourse['course_id'];
                        $venue_id = $theCourse['venue_id'];
                        $staff_id = $theCourse['staff_id'];
                        $tests = $this->conn->query("SELECT c.course_name,v.name,s.first_name,s.last_name FROM course_tb AS c, venue_tb AS v,staff_tb AS s WHERE c.course_id='$course_id' AND v.venue_id='$venue_id' AND s.staff_id='$staff_id'");
                        $test = $tests->fetch_assoc();
                        echo "<td>".$test['course_name']."<br />".$test['name']."<br />".$test['first_name']." ".$test['last_name']."</td>";
                    }else{
                        echo "<td class='droppable ui-widget-header'></td>";
                    }
                }
        }
            echo "</tr>";
                }
            

    }
//$obj = new New_period;
//$obj->get_period("COMPUTER SCI AND ENG.");
?>