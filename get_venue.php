<!DOCTYPE html>
<html>
    <head>
        <title>Add new faculty!</title>
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="style/mystyle.css" />
        <script src="bootstrap/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
<?php
//'venue_image' from index.php
require_once("classes/new_venue.php");
$venue_image = $_POST['venue_image'];
$obj = new New_venue;
$obj->get_venue_image($venue_image);
?>
    </body>
</html>