<?php
$course=$_POST['course'];
$dept=$_POST['dept'];
$staff=$_POST['staff'];
$venue=$_POST['venue'];
$day=$_POST['day'];
$perio=$_POST['period'];
$period = date("G:i:s", strtotime($perio));
require_once("classes/db_class.php");
class Update extends Db_class{
    private $dept_id;
    private $course_id;
    private $staff_id;
    private $venue_id;
    private $days_id;
    private $period_id;
    public function __construct(){
        parent::__construct();
    }
    public function get_dept($_dept){
        $data = $this->conn->query("SELECT dept_id FROM department_tb WHERE dept_name='$_dept'");
        while($dept_id=$data->fetch_assoc()){
            $this->dept_id = $dept_id['dept_id'];
        }
    }
    public function get_course($_course){
        $data = $this->conn->query("SELECT course_id FROM course_tb WHERE course_name='$_course'");
        while($course_id=$data->fetch_assoc()){
            $this->course_id = $course_id['course_id'];
        }
    }
    public function get_staff($_staff){
        $data = $this->conn->query("SELECT staff_id FROM staff_tb WHERE CONCAT(first_name,' ',last_name)='$_staff'");
        while($staff_id=$data->fetch_assoc()){
            $this->staff_id = $staff_id['staff_id'];
            
        }
    }
    public function get_venue($_venue){
        $data = $this->conn->query("SELECT venue_id FROM venue_tb WHERE name='$_venue'");
        while($venue_id=$data->fetch_assoc()){
            $this->venue_id = $venue_id['venue_id'];
        }
    }
    public function get_day($_day){
        $data = $this->conn->query("SELECT days_id FROM days_tb WHERE day='$_day'");
        while($days_id=$data->fetch_assoc()){
            $this->days_id = $days_id['days_id'];
        }
    }
    public function get_period($_period){
        $data = $this->conn->query("SELECT period_id FROM period_tb WHERE start_time='$_period'");
        while($period_id=$data->fetch_assoc()){
            $this->period_id = $period_id['period_id'];
        }
    }
    public function data_update(){
        $fStaff = $this->conn->query("SELECT * FROM course_alloc_tb WHERE staff_id='$this->staff_id' AND period_id='$this->period_id' AND days_id='$this->days_id'");
        $fVenue = $this->conn->query("SELECT * FROM course_alloc_tb WHERE venue_id='$this->venue_id' AND period_id='$this->period_id' AND days_id='$this->days_id'");
        if($fStaff->fetch_assoc()){
            echo "Lecturer is engaged at this time";
        }else if($fVenue->fetch_assoc()){
            echo "The venue is in use at this time";
        }else{
        $stmt = $this->conn->prepare("INSERT INTO course_alloc_tb (period_id, staff_id,course_id,dept_id,venue_id,days_id) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("iiiiii",$this->period_id,$this->staff_id,$this->course_id,$this->dept_id,$this->venue_id,$this->days_id);
        $stmt->execute();
            echo "successful";
        }
    }

   
    }
$obj = new Update;
$obj->get_dept($dept);
$obj->get_course($course);
$obj->get_staff($staff);
$obj->get_venue($venue);
$obj->get_day($day);
$obj->get_period($period);
$obj->data_update();
//$x=$period;
//$y=$staff;
//$s=$course;
//$f=$dept;
//$g=$venue;
//$k=$day;
//$obj->data_update($x,$y,$s,$f,$g,$k);
?>