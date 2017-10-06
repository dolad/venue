<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add new faculty!</title>
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="style/mystyle.css" />
        <script src="bootstrap/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
         <script type="text/javascript">
$(document).ready(function()
{
$(".faculty").click(function()
{
var faculty_id=$(this).val();
var dataString ='faculty_id='+faculty_id;//faculty_name actually, too lazy to change it.

$.ajax
({
type: "POST",
url: "get_dept_filtered.php",
data: dataString,
cache: false,
success: function(html)
{
$(".dept").html(html);
} 
});

});
});
</script>
        <style>
            .panel{
                text-align: center;
            }
/*
            .row1 .panel-success{
                height: 250px;
            }
*/
        </style>
    </head>
    <body>
         <?php
            require("header.php");
        ?>
    <div class="container">
    <div class="row">    
        <div class="col-md-6">
            <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel panel-heading"><h4>Add New Staff</h4></div>
                    <div class="panel panel-body">
                    <form action="save_staff.php" method="post">
                        <div class="form-group">
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name"/>
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" />
                        </div>
                         <div class="form-group">
                        <input type="text" class="form-control" name="phone" id="Phone" placeholder="Phone" />
                        </div>
                        <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" name="staff_no" id="staff_no" placeholder="Staff Identifification No" />
                        </div>
                        <div class="form-group">
                        <select name="faculty" class="form-control faculty">
                             <?php
                            require "save_fac.php";
                            $save->get_fac();
                            ?>    
                        </select>
                        </div>
                        <div class="form-group">
                        <select name="dept_name" class="form-control dept">
                            <?php
//                            require "save_dept.php";
//                            $save->get_dept();
                            ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="hod">HOD</option>
                                <option value="lecturer">lecturer</option>
                            </select>
                        
                        </div>
                        <div class="form-group">
                        <input type="submit" name="save" class="btn btn-danger" value="save" />
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>
                <div class="col-md-6">
                <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel panel-heading"><h4>Add New Student</h4></div>
                    <div class="panel panel-body">
                    <form action="save_student.php" method="post">
                        <div class="form-group">
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name"/>
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" />
                        </div>
                         <div class="form-group">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" />
                        </div>
                        <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" name="matric_no" id="matric" placeholder="Matric No" />
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="gender" value="male">Male</label>
                            <label><input type="radio" name="gender" value="female">Female</label>
                        </div>
                        <div class="form-group">
                        <select class="form-control" name="faculty">
                            <?php
                             require "save_fac.php";
                            $save->get_fac();
                            ?>
                        </select>
                        </div>
                        <div class="form-group">
                        <select class="form-control" name="new_dept">
                            <?php
//                            require "save_dept.php";
//                            $save->get_dept();
                            ?>
                        </select>
                        </div>
                        <div class="form-group">
                        <input type="submit" name="save" class="btn btn-danger" value="save" />
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
    </div>
        </div>
    </body>
</html>
