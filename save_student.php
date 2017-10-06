<?php
require_once "classes/new_student.php";
$save=new New_student;
if(isset($_POST['save'])){
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $matric_no=$_POST['matric_no'];
    $gender = $_POST['gender'];
    $new_dept = $_POST['new_dept'];
$save->save_student($first_name,$last_name,$phone,$email,$matric_no,$gender,$new_dept);
}
    
?>