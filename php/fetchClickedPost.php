<?

try {
$myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
$myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $myPDO->prepare("SELECT * FROM entries WHERE id='$id'");
$stmt->execute();

if ($stmt) {

while ($posts = $stmt->fetch()) {
?>
    <div class="content">
        <div class="main">
            <div class="titlearea">
                <h2><?php echo $posts['title']; ?></h2>
                <h4><?php echo $posts['created']; ?></h4>
                <h4><?php echo $posts['author']; ?></h4>
            </div>

            <img src="<?php echo 'images/'.$posts['image']; ?>" width="85%" height="60%">

            <p><?php echo $posts['body']; ?></p>

            <br><br>
            <p></p>

        </div>
    </div>

    <?php
}
}
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$myPDO = null;

?>
