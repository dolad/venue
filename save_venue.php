<?php
require_once "classes/new_venue.php";
$save=new New_venue;
if(isset($_POST['save'])){
    $venue_name = $_POST['new_venue'];
    $venue_image = $_FILES['venue_image']['name'];
    $cat = $venue_name."-".$venue_image;
    $latitude = $_POST['lat'];
    $longitude = $_POST['lng'];
    move_uploaded_file($_FILES['venue_image']['tmp_name'],"venue_images/".$cat);
  $save->save_venue($venue_name,$cat,$latitude,$longitude);
}
    
?>