<?php
 require "save_dept.php";
$fac_name = $_POST['faculty_id'];
 $save->get_dept_filtered($fac_name);
 ?>