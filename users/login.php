<?php
session_start();
// This page is used for creating the login information, this information is sent to the server and is verified and made sure that the 
//username and password are the correct format and it is a valid username and password that matches the server. If it is, you are sent to
//a similar page to the main page, except that now you have access to the "post" "edit" and "delete post" buttons

require '../php/connect.php';

$myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
$myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//saving the username so if you mess up and come back its still, there as well as not saving the password if it is wrong
$_SESSION['username'] = $_POST['username'];
$pass = $_POST['password'];
$name = $_SESSION['username'];

// this statement is selecting from the server where the username is the username entered and password is the password entered
$stmt = $myPDO->prepare("SELECT * FROM users WHERE username='$name' AND password='$pass'");
$stmt->execute();

$row = $stmt->fetch();
// finding the username and passwords and if they are the same as your credentials, it will take you to the main page where you can add/del/edit posts
if ($row[username] == $name && $row[password] == $pass) {
    $_SESSION['user'] = $name;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
    echo '<script>window.location.href = "../index.php";</script>';
    
    exit;

} else
    //otherwise if it is wrong, send you to a page that is empty
    echo "invalid";

?>
