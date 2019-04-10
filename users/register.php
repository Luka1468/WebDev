<?php

require '../php/connect.php';

$myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
$myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


try {

    $name = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

$sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$pass')";

$myPDO->exec($sql);
    echo "Registration successful.";


} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}

$myPDO = null;

?>