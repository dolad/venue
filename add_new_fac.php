<?php
if(!isset($_SESSION)){
session_start();
}
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
var dataString ='faculty_id='+faculty_id;

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
            .row1 .panel-success{
                height: 350px;
            }
            .row2 .panel-success{
                height: 300px;
            }
        </style>
    </head>
    <body>
           <?php
            require("header.php");
            ?>
        <div class="container">
            <div class="row row1">
            <div class="col-md-4">
                <div class="panel-group">
                    <div class="panel panel-success">
                        <div class="panel panel-heading"><h4>New Faculty Setup</h4></div>
                            <div class="panel panel-body">
                                <form action="save_fac.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="new_fac" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="saveIt" class="btn btn-danger" value="save" />
                                </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel panel-heading"><h4>New Department Setup</h4></div>
                    <div class="panel panel-body">
                    <form action="save_dept.php" method="post">
                        <div class="form-group">
                        <select name="faculty" class="form-control" id="faculty">
                            <?php
                            require "save_fac.php";
                            $save->get_fac();
                            ?>
                        </select>
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
            </div>
                <div class="col-md-4">
                <div class="panel-group">
                <div class="panel panel-success">
                    <div class="panel panel-heading"><h4>New Venue Setup</h4></div>
                    <div class="panel panel-body">
                    <form action="save_venue.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <input type="text" class="form-control" name="new_venue" id="venue" placeholder="New Venue" />
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" name="lat" id="lat" placeholder="Latitude" />
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" name="lng" id="lng" placeholder="Longitude" />
                        </div>
                        <div class="form-group">
                        <input type="file" class="form-control" name="venue_image" />
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
            <div class="row row2">
                <div class="col-md-4">
                <div class="panel-group">
                    <div class="panel panel-success">
                    <div class="panel panel-heading"><h4>New Day Setup</h4></div>
                    <div class="panel panel-body">
                        <form action="save_day.php" method="post">
                        <div class="form-group">
                        <select class="form-control" name="new_day[]" id="day" multiple="multiple">
                          <option>SUNDAY</option>  <option>MONDAY</option><option>TUESDAY</option><option>WEDNESDAY</option><option>THURSDAY</option><option>FRIDAY</option><option>SATURDAY</option>
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
                   <div class="col-md-4">
                <div class="panel-group">
                    <div class="panel panel-success">
                    <div class="panel panel-heading"><h4>New Period Setup</h4></div>
                    <div class="panel panel-body">
                        <form action="save_period.php" method="post">
                        <div class="form-group">
<!--
                        <select class="form-control" name="new_period[]" id="day" multiple="multiple">
                          <option>8-9</option>  <option>9-10</option><option>10-11</option><option>11-12</option><option>12-13</option><option>13-14</option><option>14-15</option><option>15-16</option><option>16-17</option><option>17-18</option><option>18-19</option>
                        </select>
-->
                            <input type="time" class="form-control" name="start_time" />
                            
                        </div>
                        <div class="form-group">
                        <input type="time" class="form-control" name="end_time" />    
                        </div>
                        <div class="form-group">
                        <input type="submit" name="save" class="btn btn-danger" value="save" />
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
                </div>
                 <div class="col-md-4">
                <div class="panel-group">
                    <div class="panel panel-success">
                    <div class="panel panel-heading"><h4>New Course Setup</h4></div>
                    <div class="panel panel-body">
                        <form action="save_course.php" method="post">
                         <div class="form-group">
                        <select name="faculty" class="form-control faculty" id="faculty">
                            <?php
                            require "save_fac.php";
                            $save->get_fac();
                            ?>
                        </select>
                        </div>   
                        <div class="form-group">
                        <select class="form-control dept" name="new_dept">
                           
                        </select>
                        </div>
                        <div class="form-group">
                        <input type="text" name="new_course" placeholder="New course" class="form-control" />
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