
<!DOCTYPE html>
<html>
    <head>
        <title>Add new faculty!</title>
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="style/mystyle.css" />
        <script src="bootstrap/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script>
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
               
        
    </head>
    <body>
         <?php
            require("header.php");
        ?>
    <div class="container">
        <div class="row">
        <div class="col-md-4">
            <div class="form-group">
        <select class="form-control faculty"  name="faculty" id="faculty">
            <option>Select faculty</option>
                <?php
                require_once "classes/new_fac.php";
                $save = new New_fac;
                $save->get_fac();
                ?>
        </select>
        </div>
            </div>
        <div class="col-md-3">
            <div class="form-group">
        <select class="form-control dept" name="dept" id="dept">
             <option>Sort timetable by department</option>
        </select>
            </div>
        </div>
            <div class="col-md-3">
            <div class="form-group">
        <select class="form-control" name="venues" id="venues">
            <option>Sort timetable by venue</option>
             <?php
                            require_once "classes/new_venue.php";
                            $save = new New_venue;
                            $save->get_venue();
                    ?>
        </select>
            </div>
        </div>
            
            <div class="col-md-2">
            <div class="form-group">
            <button class="btn btn-danger" id="view" data-toggle="modal" data-target="#myModal">View venue</button>
            </div>
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                	<button type="button" class="close" data-dismiss="modal">&times;</button>
                                    
                            </div>
                            <div class="modal-body" id="image_disp">
                            
                            </div>
                            <div class="modal-footer">
                            <button class="btn btn-primary" type="button" id="nav">Navigate</button>
                            <button data-dismiss="modal" class="btn btn-danger">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
        <div class="row">
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
                        //require_once "course_alloc.php";
                        //$getTime = new Alloc;
                        //$getTime->set_course();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>
                      <script>
            
            $("#dept").click(function(){
            var chosenDept = $(this).val();
            $.post("course_alloc.php", {dept:chosenDept},function(data){
           $("#display").html(data);
        });
                });
            $("#view").click(function(){
                var venue_image = $("#venues").val();
                $.post("get_venue.php",{venue_image:venue_image},function(data){
                    $("#image_disp").html(data);
                });
            });
            $("#venues").click(function(){
                var venue = $(this).val();
                $.post("course_alloc_by_venue.php",{venue:venue},function(data){
                    $("#display").html(data);
                });
               
            });
            $("button#nav").click(function(){
                var venue = $("#venues").val();
                 $.post("navigate.php",{venue:venue},function(data){
                    $("body").html(data);
                });
            })
        </script>
    </body>
</html>