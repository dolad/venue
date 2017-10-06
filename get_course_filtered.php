
<?php
 require "classes/new_course.php";
$getIt = new New_course;
$dept = $_POST['dept'];
 $getIt->get_course_filtered($dept);
 ?>
<html>
<head>
<link type="text/css" rel="stylesheet" href="bootstrap/jquery-ui.css" />
        <script src="bootstrap/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
    $(function(){
      $(".draggable").draggable({revert:true});
        $(".droppable").droppable({
            drop:function(event,ui){
                $(this).html(ui.draggable.html());
                var course = ui.draggable.html();
                var period = $(this).closest("tr").find("td").first().html();
                var day = $(this).closest("table").find("th").eq($(this).index()).html();
                var venue = $("#venue").val();
                var staff = $("#lecturer").val();
                var dept=$("#dept").val();
                var faculty = $("#faculty").val();
                      $.post("update_course_id.php", { course:course,period:period,day:day,venue:venue,staff:staff,dept:dept }, function (data) {
                        $("#dashboard").html(data);
                          
                          //alert(data);
                    });
                $("#dept").trigger('click');
            }
        });
      });

    })
</script>
</head>
</html>