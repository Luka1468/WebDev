<?php
function nextPage()
{
    try {

        $myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
        $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $myPDO->prepare("SELECT * FROM entries ORDER BY created DESC LIMIT 2 OFFSET 2");
        $stmt->execute();

        if ($stmt) {

            while ($posts = $stmt->fetch()) {

                ?>
                <div class="titlearea">
                    <h1 style="margin: 5px; padding: 0;"><?php echo $posts['title']; ?></h1>
                    <h4 style="margin: 5px; padding: 0;"><?php echo $posts['created']; ?></h4>
                    <h4 style="margin: 5px; padding: 0;">By <?php echo $posts['author']; ?></h4>
                </div>

                <a href="php/Entry.php?id=<?
                echo $posts[id]; ?>"><img src="<?php echo 'pictures/' . $posts['image']; ?>" width="85%"
                                          height="60%"></a>

                <p style="font-size: 15px;"><?php echo $posts['summary']; ?></p>


                <?php
                if (isset($_SESSION['user'])) {
                    ?>
                    <a href="php/Edit.php?id=<?
                    echo $posts[id]; ?>">
                        <button>Edit</button>
                    </a>
                    <a href="php/Delete.php?id=<?
                    echo $posts[id]; ?>">
                        <button>Delete</button>
                    </a>

                    <br><br>
                    <?php
                }
                ?>

                <?php
            }

        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $myPDO = null;

}
?>
