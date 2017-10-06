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
            <div class="row admin">
                <div class="col-md-6 col-md-offset-3">
                    <div class="col-md-offset-4 ad">
                        <img src=images/admin-logo.jpg class="admin-logo" />
                        <h1 style="margin-left:0%">Lecturer</h1>
                    </div>
                    <form class="form" role="form" action="get_lecturer.php" method="post">
                            <div class="form-group">
                                <label for="user">Username:</label>
                                <input type="text" class="form-control input-lg" name="staff_no" id="user">
                            </div>
                            <div class="form-group">
                                <label for="pass">Password:</label>
                                <input type="password" class="form-control input-lg" name="email" id="pass">
                            </div>
                            <div class="form-group col-md-offset-5">
                                <button class="btn btn-lg btn-success" name="login">Login</button>
                            </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </body>
</html>