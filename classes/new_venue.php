<?php
require_once("db_class.php");
class New_venue extends Db_class{
    private $venue_image;
    public function __construct(){
        parent::__construct();
    }
    public function save_venue($venue_name,$venue_image,$lat,$lng){
        $this->venue_image = $venue_image;
        $this->myQuery = $this->conn->prepare("INSERT INTO venue_tb (name,image,latitude,longitude) VALUES (?,?,?,?)");
        $this->myQuery->bind_param("ssss",$venue_name,$this->venue_image,$lat,$lng);
        $this->myQuery->execute();
        header("Location:add_new_fac.php");
    }
    public function get_venue(){
        $stmt=$this->conn->query("SELECT * FROM venue_tb");
        while($row=$stmt->fetch_assoc()){
            echo "<option>".$row['name']."</option>";
        }
    }
    public function get_venue_image($image){
        $venue_image = $this->venue_image;
        $stmt = $this->conn->query("SELECT * FROM venue_tb WHERE name = '$image'");
        $data = $stmt->fetch_assoc();
        $image_cat = $data['image'];
        echo "<img src='venue_images/$image_cat' style='width:100%'>";
        
    }
   
    }

?>