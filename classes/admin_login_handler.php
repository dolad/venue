<html>
    <head>
        <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
    </head>
</html>
<?php 
require_once("db_class.php");
class Admin_login_handler extends Db_class{
    public function __construct(){
        parent::__construct();
    }
    
    public function get_admin($admin_name, $pass){
        $data = $this->conn->query("SELECT * FROM admin_tb WHERE admin_name='$admin_name' AND admin_pass='$pass'");
        if(!$row=$data->fetch_assoc()){
            include("admin-login.php");
            echo "<div class='alert alert-danger col-md-4 col-md-offset-4' style='text-align:center; padding-top:4px; padding-bottom:4px'><span class='glyphicon glyphicon-remove'></span>Incorrect user name, password or both</div>";
        }else{
            $_SESSION['admin_id'] = $row['admin_id'];
            header("Location:admin_regular.php");
            //echo "logged in";
        }
        
    }
        public function get_hod($first_name,$phone){
        $data = $this->conn->query("SELECT * FROM staff_tb WHERE first_name='$first_name' AND status='hod' AND phone='$phone'");
        if(!$row=$data->fetch_assoc()){
            include("hod_login.php");
            echo "<div class='alert alert-danger col-md-4 col-md-offset-4' style='text-align:center; padding-top:4px; padding-bottom:4px'><span class='glyphicon glyphicon-remove'></span>You are not an HOD,UPGRADE:)</div>";
        }else{
            $_SESSION['staff_id'] = $row['staff_id'];
            header("Location:admin_regular.php");
            
        }
        
    }
    
    }


?>