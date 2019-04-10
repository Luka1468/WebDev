<?php
//this page sends the information to the server





require '../php/connect.php';

$myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
$myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//gets users username, password/email
try {

    $name = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
//adds the information into the table
$sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$pass')";
    
//if it is added successfully it sends it into the server and gives you a registration successful
$myPDO->exec($sql);
    echo "Registration successful.";


} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}

$myPDO = null;

?>
