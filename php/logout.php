<?php
//destroying the sessions and logging out of your prfile

session_start();
session_destroy();
echo "Logging out...";
sleep(1);
echo '<script>window.location.href = "../index.php";</script>';
?>
