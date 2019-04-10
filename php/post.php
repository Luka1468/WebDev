<?php
//this page is for getting and fetching the posts that were clicked
session_start();
?>


<?php
require 'connect.php';
?>

<?php require 'mainHeader.php'; ?>

<?
//gets the id of the post to fetch
$_SESSION['id'] = $_GET['id'];
$id = $_GET['id'];

//passes the information to the next file
require 'fetchClickedPost.php';

require 'sidebar.php'; ?>


<div class="clear"></div>
<div class="footer">
</div>
</body>
</html>
