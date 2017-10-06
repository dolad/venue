<?php
require_once "classes/new_period.php";
$setCourse = new New_period;
$dept = $_POST['dept'];
$setCourse->get_period($dept);
?>