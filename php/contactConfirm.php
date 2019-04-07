<?php
/**
 * Created by PhpStorm.
 * User: Gunar
 * Date: 4/4/2019
 * Time: 4:20 PM
 */
session_start();
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
require ('connect.php');
try {
    $dbh = new PDO("mysql:host=localhost; dbname=necajevl_Final_Project_WebDev_Sem2;",
        $user, $passwd);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    $command= "INSERT INTO phase1 (name, email, message) VALUES ('$name', '$email', '$messgae')";

    $dbh->exec($command);
   // $command="INSERT INTO  (name, player_count, indoor, referee_count, origin) VALUES ('$name','$indoor', '$playerCount','$refCount','$origin')";
}catch(PDOException $e){

    echo "Connection failed: " . $e->getMessage();
}

?>

