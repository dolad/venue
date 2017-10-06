<?php
if(!isset($_SESSION)){
session_start();
}
?>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
    </head>
</html>
<?php 
require_once("db_class.php");
class Lecturer_login_handler extends Db_class{
    public function __construct(){
        parent::__construct();
    }
    
    public function get_lecturer($staff_no, $email){
        $data = $this->conn->query("SELECT * FROM staff_tb WHERE staff_no='$staff_no' AND email='$email'");
        if(!$row=$data->fetch_assoc()){
            include("lecturer_login.php");
            echo "<div class='alert alert-danger col-md-4 col-md-offset-4' style='text-align:center; padding-top:4px; padding-bottom:4px'><span class='glyphicon glyphicon-remove'></span>Incorrect user name, password or both</div>";
        }else{
            $_SESSION['staff_no'] = $row['staff_no'];
            $_SESSION['name'] = $row['first_name'].' '.$row['last_name'];
            header("Location:lecturer_schedule.php");
            //echo "logged in";
        }
        
    }
        
        
    }
    
    


?>