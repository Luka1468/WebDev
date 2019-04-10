<!--
This page is for sending the information to the server
-->

<?php
session_start();
if (isset($_SESSION['user'])) {

    ?>

    <?php

    require 'connect.php';

    $title = $_POST['title'];
    $date = $_POST['date'];
    $author = $_POST['author'];
    $image = $_POST['image'];
    $summary = $_POST['summary'];
    $body = $_POST['body'];

    try {


        $myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
        $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//inserting the items into the appropriate catagories
        $sql = "INSERT INTO `entries` (`author`, `title`, `summary`, `image`, `body`, `created`) 
VALUES ('$author', '$title', '$summary', '$image', '$body', '$date')";

        $myPDO->exec($sql);

        echo '<script>window.location.href = "../index.php";</script>';

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "<br>";
    }

    $myPDO = null;

    ?>

    <?php
}
?>
