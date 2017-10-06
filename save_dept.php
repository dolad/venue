<?php
require_once "classes/new_dept.php";
$save=new New_dept;
if(isset($_POST['save'])){
$fac_name = $_POST['faculty'];
$dept_name = $_POST['new_dept'];
$save->save_dept($fac_name,$dept_name);
    //print_r($save);
}
    
?>