<?php
require_once "classes/admin_login_handler.php";
$get=new Admin_login_handler;
if(isset($_POST['login'])){
    $admin_name = $_POST['admin_name'];
    $password = $_POST['pass'];
$get->get_admin($admin_name,$password);
}
   //header("Location:admin-login.php"); 
?>