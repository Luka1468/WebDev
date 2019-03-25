<?php
/**
 * Created by PhpStorm.
 * User: Gunar
 * Date: 3/25/2019
 * Time: 6:52 PM
 */
session_start();

$_SESSION['fname']= $_POST['fname'];
$_SESSION['lname']= $_POST['lname'];
$_SESSION['gender']= $_POST['gender'];
$_SESSION['user']= $_POST['user'];
$_SESSION['pass']= $_POST['pass'];




?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
<div id="cool">
    <h1>Sign Up Here !</h1>
    <form action="" method="POST">
        <label>First Name</label><input type="text" name="fname">
        <label>Last Name</label><input type="text" name="lname">
        <label>Email</label><input type="email" name="email">
        <label>Gender</label>
        <input type="radio" name="gender">Male<br>
        <input type="radio" name="gender">Female<br>
        <label>Username</label><input type="text" name="user">
        <label>Password</label><input type="password" name="pass">






    </form>
</div>

</body>
</html>
