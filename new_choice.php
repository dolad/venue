
<!DOCTYPE html>
<html>
    <head>
        <title>Add new faculty!</title>
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="style/mystyle.css" />
        <script src="bootstrap/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <style>
            img{
                border-radius: 250px;
                border: solid 10px #ccc;
            }
            p{
                font-size: 16px;
                color: white;
            }
        </style>
    </head>
    <body>
         <?php
            require("header.php");
        ?>
    <div class="container">
        <div class="col-md-6 text-center">
            <a href=add_new_staff.php><img src="images/human.jpg" /></a>
            <p>New Staff</p>
            <p>New Student</p>
        </div>
        <div class="col-md-6 text-center">
            <a href=add_new_fac.php><img src="images/cityscape.gif" /></a>
            <p>New Faculty,New Dept</p>
            <p>New course,New venue</p>
            <p>New Day,New Period</p>
        </div>
    </div>
    </body>
</html>