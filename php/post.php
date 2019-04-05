<?php
session_start();
?>


<?php
require 'connect.php';
?>

<?php require 'mainHeader.php'; ?>

<?

$_SESSION['id'] = $_GET['id'];
$id = $_GET['id'];


require 'fetchClickedPost.php';

require 'sidebar.php'; ?>


<div class="clear"></div>
<div class="footer">
</div>
</body>
</html>