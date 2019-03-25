<?
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    </head>
    <body>
        <div class="container">
            <!-- the top of the website where the logo or title/ some navigations can be like top trending, latest news... -->
            <div class="top">
                <!-- logo of the blog -->
                <h3 class="textpadding"><img src="pictures/logo.jpg" width="50" height="50" border="2">
                    <!-- big wording of the title of the blog -->
                    <img src="pictures/welcome.jpg" width="170" height="50" border="2">

                </h3>
                <div class="textpadding" >

                </div>

            </div>
            <!-- will be the navigations with specific catagory's of those, sports, city,fashion, realestate-->
            <div class="nav">
                <!-- sets up the navigation bar for the  -->
                <div >
                    <h3 class="textpadding">
                        <!-- links for main articles -->

                        | <a href="xyz">Home</a> 

                        | <a href="xyz">About Me</a> 

                        | <a href="xyz">Contact Info</a> 

                        | <a href="xyz">My Services</a> 

                        | <a href="xyz">Cook Books</a> 

                    </h3>
                </div>

            </div>

            <div>
                <form>
                    Username: <input type = "text" name = "user">
                    Password: <input type ="password" name ="pass">
                    <input type ="submit" name ="submit" value = "Login">
                    <input type="button" name ="signup" value = "Sign Up">
                    <a href ="forgetpswd.php">forgot password</a>
                </form>
            </div>
    </body>
</html>