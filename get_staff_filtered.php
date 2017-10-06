<?php
 require "classes/new_staff.php";
$getIt = new New_staff;
$dept = $_POST['dept'];
 $getIt->get_staff_filtered($dept);
 ?>