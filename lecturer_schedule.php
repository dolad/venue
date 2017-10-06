<?php
if(!isset($_SESSION)){
session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create new</title>
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="style/mystyle.css" />
        <script src="bootstrap/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        
    </head>
    <body>
           <?php
            require("header.php");
            ?>
        <div class="container">
                    <div class="row">
                        <div class="alert alert-info col-md-5" style="padding-top:4px;padding-bottom:4px"><?php echo 'Below are your courses for the week, '.$_SESSION['name'] ?></div>
            <div class="col-md-12">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>DAYS/TIME</th>
                            <?php
                            require_once "classes/new_day.php";
                            $save = new New_day;
                            $save->get_day();
                            
                            ?>
                        </tr>
                    </thead>
                    <tbody id="display">
                       <?php
                       require_once("classes/lecturer_schedule_class.php");
                        $obj  = new Lecturer_schedule;
                        $obj->set_course();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </body>
</html>