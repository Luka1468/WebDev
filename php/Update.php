<?php
// this page gets the updated information you added into the other page, and sends it to the server
session_start();
if (isset($_SESSION['user'])) {

    ?>

    <?php

    require 'connect.php';

    $id = $_POST['id'];
    $author = $_POST['author'];
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $image = $_POST['image'];
    $body = $_POST['body'];
    $date = $_POST['date'];

    try {

        $myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
        $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //$sql = "UPDATE sport SET name=?, player_count=?, indoor=?, referee_count=?, origin=? WHERE sport_id=?";
        $sql = "UPDATE `entries` SET `author`=?,`title`=?,`summary`=?,`image`=?,`body`=?, `created`=? WHERE id='$id'";

        // Prepare statement
        $stmt = $myPDO->prepare($sql);

        // execute the query
        $stmt->execute([$author, $title, $summary, $image, $body, $date]);


        echo "Updating entry...";
        sleep(1);
        echo "<script>window.location.href = 'Entry.php?id=$id';</script>";


    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }


    ?>


    <?php
}
?>
