<?php
require_once "classes/course_alloc_class.php";
$getTime = new Alloc;
$venue = $_POST['venue'];
$getTime->set_course_by_venue($venue);
?>