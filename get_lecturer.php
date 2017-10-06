<?php
require_once "classes/lecturer_login_handler.php";
$get=new Lecturer_login_handler;
if(isset($_POST['login'])){
    $staff_no = $_POST['staff_no'];
    $email = $_POST['email'];
$get->get_lecturer($staff_no,$email);
}
   //header("Location:admin-login.php"); 
?>