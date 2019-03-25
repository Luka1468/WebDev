<?
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/main.css">
    </head>
    <body>
        <div>
            <form>
                Username: <input type = "text" name = "usrname">
                Password: <input type ="password" name ="pswd">
                <input type ="submit" name ="submit" value = "Login">
                <input type="button" name ="signup" value = "Sign Up">
                <a href ="forgetpswd.php">forgot password</a>
            </form>
        </div>
    </body>
</html>