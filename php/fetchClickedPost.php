<?php
session_start();


$_SESSION['id'] = $_GET['id'];
$id = $_SESSION['id'];
$min = $_SESSION['min'];
$max = $_SESSION['max'];

try {
    $myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
    $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $myPDO->prepare("SELECT * FROM entries WHERE id='$id' ORDER BY created DESC");
    $stmt->execute();

    if ($stmt) {

        while ($posts = $stmt->fetch()) {
            ?>
            <div class="content">
                <div class="main">
                    <div class="titlearea">
                        <h2><?php echo $posts['title']; ?></h2>
                        <h4><?php echo $posts['created']; ?></h4>
                        <h4>By <?php echo $posts['author']; ?></h4>
                    </div>

                    <img src="<?php echo '../pictures/' . $posts['image']; ?>" width="85%" height="60%">

                    <p style="font-size: 16px;"><?php echo $posts['body']; ?></p>

                    <br><br>
                    <p></p>

                    <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                        <a href="Edit.php?id=<?
                        echo $posts[id]; ?>">
                            <button>Edit</button>
                        </a>

                        <a href="Delete.php?id=<?
                        echo $posts[id]; ?>">
                            <button>Delete</button>
                        </a>


                        <br><br>
                        <?php
                    }
                    ?>
                    <br>
                    <div id="prevnext"><a href="Entry.php?id=<? echo $posts[id] - 1; ?>">Previous Page</a>
                        <a href="Entry.php?id=<?
                        echo $posts[id] + 1; ?>">Next Page</a></div>
                    <!-- need to set last page so next page doesnt appear if id doesn't exit -->

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
