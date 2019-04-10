<?php
//this page is activated when the delete button is pressed underneith the post
session_start();
if(isset($_SESSION['user'])) {

    ?>

    <?php
//Deletes the selected row from the database

    require 'connect.php';

    $id = $_GET['id'];

    try {

        $myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
        $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//gets the id and then deletes the id from the specific row
        $sql = "DELETE FROM entries WHERE id='$id'";
        $myPDO->exec($sql);
        echo "Deleting entry...";
        sleep(1);

        echo '<script>window.location.href = "../index.php";</script>';

    } catch (PDOException $e) {
        echo "Error " . $e->getMessage() . "<br>";
    }

    $myPDO = null;


    ?>


    <?php
}
?>
