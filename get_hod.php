<?php
require_once "classes/admin_login_handler.php";
$get=new Admin_login_handler;
if(isset($_POST['login'])){
    $first_name = $_POST['first_name'];
    $password = $_POST['pass'];
$get->get_hod($first_name,$password);
}
   //header("Location:admin-login.php"); 
?>