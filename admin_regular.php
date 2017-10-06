
<!DOCTYPE html>
<html>
    <head>
        <title>Add new faculty!</title>
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="style/mystyle.css" />
        <link type="text/css" rel="stylesheet" href="bootstrap/jquery-ui.css" />
        <script src="bootstrap/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/jquery-ui.js"></script>
        
                 <script type="text/javascript">
                     //dept
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
 //course                    
$(document).ready(function()
{
$(".dept").click(function()
{
var dept=$(this).val();
var dataString ='dept='+dept;

$.ajax
({
type: "POST",
url: "get_course_filtered.php",
data: dataString,
cache: false,
success: function(html)
{
$(".course").html(html);
} 
});

});  
 
    
});
  //staff                   
$(document).ready(function()
{
$(".dept").click(function()
{
var dept=$(this).val();
var dataString ='dept='+dept;

$.ajax
({
type: "POST",
url: "get_staff_filtered.php",
data: dataString,
cache: false,
success: function(html)
{
$(".staff").html(html);
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
            <div class="col-md-3">
                <div class="form-group">
                <label for="faculty">Faculty:</label>
                <select name="faculty" class="form-control faculty" id="faculty">
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
                <label for="dept">Department:</label>
                <select name="dept" class="form-control dept" id="dept">
               
                </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label for="venue">Venue:</label>
                <select name="venue" class="form-control" id="venue">
                    <?php
                            require_once "classes/new_venue.php";
                            $save = new New_venue;
                            $save->get_venue();
                    ?>
                </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label for="lecturer">Lecturer:</label>
                <select name="lecturer" class="form-control staff" id="lecturer">
                    <?php
                            require_once "classes/new_staff.php";
                            $save = new New_staff;
                            $save->get_staff();
                ?>
                </select>
                </div>
            </div>
            </div>
        
            <div class="row">
            <div class="col-md-2">
                <div class="alert alert-warning" id="dashboard"></div>
                <table class="table table-bordered" style="position:relative; z-index:1;">
                    <thead>
                        <tr>
                            <th>Courses</th>
                        </tr>
                    </thead>
                    <tbody class="course">
                    
                    </tbody>
                </table>
            </div>
            <div class="col-md-10">
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
                    <tbody id="show">
                            <?php
//                            require_once "classes/new_period.php";
//                            $getTime = new New_period;
//                            $getTime->get_period();
                            ?>
                    </tbody>
                </table>
            </div>
            </div>
        <a href="new_choice.php">Setup Page</a>
        </div>
    </div>
   <script>
       $("#dept").click(function(){
           var dept = $(this).val();
           $.post("set_course.php",{dept:dept},function(data){
               $("#show").html(data);
           });
       })
   </script>
    </body>
</html>