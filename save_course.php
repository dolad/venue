<?php
require_once "classes/new_course.php";
$save=new New_course;
if(isset($_POST['save'])){
    $dept_name = $_POST['new_dept'];
    $course_name = $_POST['new_course'];
  $save->save_course($course_name,$dept_name);
    echo "saved";
}
 //header("Location:add_new_fac.php");   
?>