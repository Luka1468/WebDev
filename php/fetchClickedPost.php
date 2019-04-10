<?php
// this page is for getting the post that was clicked
session_start();


$_SESSION['id'] = $_GET['id'];
$id = $_SESSION['id'];
$min = $_SESSION['min'];
$max = $_SESSION['max'];

try {
    $myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
    $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //gets the post based on the description
    $stmt = $myPDO->prepare("SELECT * FROM entries WHERE id='$id' ORDER BY created DESC");
    $stmt->execute();

    if ($stmt) {
        //dispalysthe information based on the post clicked
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
                    // if the user is logged in allow them to edit or delete the post
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
                    <!-- this page 
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
