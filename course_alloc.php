<?php
require_once "classes/course_alloc_class.php";
$getTime = new Alloc;
$dept = $_POST['dept'];
$getTime->set_course($dept);
?>