<?php
require_once "classes/new_day.php";
$save=new New_day;
if(isset($_POST['save'])){
    foreach($_POST['new_day'] as $day){
  $save->save_day($day);
    }
}
    
?>