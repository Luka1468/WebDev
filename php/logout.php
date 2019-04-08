<?php
session_start();
session_destroy();
echo "Logging out...";
sleep(1);
echo '<script>window.location.href = "../index.php";</script>';
?>