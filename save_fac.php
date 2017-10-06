<?php
require_once "classes/new_fac.php";
$save=new New_fac;
if(isset($_POST['saveIt'])){
    $fac_name = $_POST['new_fac'];
    $save->save_fac($fac_name);
    //echo "data added";
    
    
}
?>