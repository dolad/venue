<?php
require_once "classes/new_period.php";
$save=new New_period;
if(isset($_POST['save'])){
  // foreach($_POST['new_period'] as $time){
    $start = $_POST['start_time'];
    $end = $_POST['end_time'];
  $save->save_period($start,$end);
   //}
    echo "saved";
}
 //header("Location:add_new_fac.php");   
?>