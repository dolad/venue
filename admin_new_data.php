<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create new</title>
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <script src="bootstrap/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <style>
            body{
                padding-top: 30px;
                background: #000000;
            }
            .alert{
                text-align: center;
            }
            input[type="submit"]{
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success">
                    <h3>Add New Faculty</h3>
                    <form action="save_fac.php" method="post">
                        <div class="form-group">
                        <input type="text" class="form-control" name="new_fac" />
                        </div>
                        <div class="form-group">
                        <input type="submit" name="saveIt" class="btn btn-danger" value="save" />
                        </div>
                    </form>
                    <?php
//                    if(isset($_SESSION['admin_id'])){
//                        echo $_SESSION['admin_id'];
//                    }else{
//                        echo "not";
//                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-success">
                    <h3>Add New Department</h3>
                    <form action="save_dept.php" method="post">
                        <div class="form-group">
                        <select name="faculty" class="form-control" id="faculty">
                            <?php
                            require "save_fac.php";
                            $save->get_fac();
                            ?>
                        </select>
<!--
                            <script>
                            var sel = document.getElementById("faculty");
                                alert(sel.innerHTML);
                            </script>
-->
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" name="new_dept" />
                        </div>
                        <div class="form-group">
                        <input type="submit" name="save" class="btn btn-danger" value="save" />
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="alert alert-success">
                    <h3>Add New Staff</h3>
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
                        <select name="dept_name" class="form-control">
                            <?php
                            require "save_dept.php";
                            $save->get_dept();
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
                <div class="col-md-6">
                <div class="alert alert-success">
                    <h3>Day Setup</h3>
                    <form action="save_day.php" method="post">
                        <div class="form-group">
                        <select class="form-control" name="new_day[]" id="day" multiple="multiple">
                          <option value="sunday">Sunday</option>  <option value="monday">Monday</option><option value="tuesday">Tuesday</option><option value="wednesday">Wednesday</option><option value="thursday">Thursday</option><option value="friday">Friday</option><option value="Saturday">Saturday</option>
                        </select>
                        </div>
                        
                        <div class="form-group">
                        <input type="submit" name="save" class="btn btn-danger" value="save" />
                        </div>
                    </form>
                </div>
            </div>
            </div>
                 <div class="row">
                <div class="col-md-6">
                <div class="alert alert-success">
                    <h3>Add New Student</h3>
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
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="gender" value="female">Female</label>
                        </div>
                        <div class="form-group">
                        <select class="form-control" name="new_dept">
                            <?php
                            require "save_dept.php";
                            $save->get_dept();
                            ?>
                        </select>
                        </div>
                        <div class="form-group">
                        <input type="submit" name="save" class="btn btn-danger" value="save" />
                        </div>
                    </form>
                </div>
            </div>
                <div class="col-md-6">
                <div class="alert alert-success">
                    <h3>Venue Setup</h3>
                    <form action="save_venue.php" method="post">
                        <div class="form-group">
                        <input type="text" class="form-control" name="new_venue" id="venue" placeholder="New Venue" />
                        </div>
                        
                        <div class="form-group">
                        <input type="submit" name="save" class="btn btn-danger" value="save" />
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>