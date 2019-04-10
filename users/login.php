<?php
session_start();

require '../php/connect.php';

$myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
$myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$_SESSION['username'] = $_POST['username'];
$pass = $_POST['password'];
$name = $_SESSION['username'];


$stmt = $myPDO->prepare("SELECT * FROM users WHERE username='$name' AND password='$pass'");
$stmt->execute();

$row = $stmt->fetch();

if ($row[username] == $name && $row[password] == $pass) {
    $_SESSION['user'] = $name;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
    echo '<script>window.location.href = "../index.php";</script>';
    exit;

} else
    echo "invalid";

?>