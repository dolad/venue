<?php
require_once "classes/new_staff.php";
$save=new New_staff;
if(isset($_POST['save'])){
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $staff_no=$_POST['staff_no'];
    $status = $_POST['status'];
    $dept_name = $_POST['dept_name'];
$save->save_staff($first_name,$last_name,$phone,$email,$status,$dept_name,$staff_no);
}
    
?>