<?php
/**
 * Created by PhpStorm.
 * User: CS
 * Date: 4/4/2019
 * Time: 8:26 PM
 */

require 'connect.php';

//creating the database and editing the table
try {

    $myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
    $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully" . "<br>";

    /*
  "CREATE TABLE `entries` (
 `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `author` int(11) DEFAULT NULL,
 `title` varchar(255) NOT NULL,
 `summary` int(11) NOT NULL DEFAULT '0',
 `image` varchar(255) NOT NULL,
 `body` text NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";



    $sql = "INSERT INTO `entries` (`id`, `author`, `title`, `summary`, `image`, `body`, `created`) 
VALUES (1, 'Kim Jong Un', 'First title', 'Sup my friend', 'vlad.JPG', 'Body of first entry', '2019-01-01'), 
(2, 'Kim Jong Il', 'second title', 'My best friend', 'vlad.JPG', 'body of second entry', '2019-01-01')";



    $sql = "CREATE TABLE `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
)";

    */

    $myPDO->exec($sql);
    echo "New record created successfully";
    echo "<br><button onclick=\"window.location.href = 'http://sunjingw.dev.fast.sheridanc.on.ca/A6b/';\">Home</button>";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}

$myPDO = null;

?>


