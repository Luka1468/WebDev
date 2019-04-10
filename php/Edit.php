<?php
session_start();
if (isset($_SESSION['user'])) {

    require 'connect.php';

    require 'mainHeader.php'; ?>

    <div class="content">
        <div class="main">


            <?php

            $id = $_GET['id'];
            $_SESSION['author'] = $_POST['author'];
            $_SESSION['title'] = $_POST['title'];
            $_SESSION['summary'] = $_POST['summary'];
            $_SESSION['image'] = $_POST['image'];
            $_SESSION['body'] = $_POST['body'];
            $_SESSION['created'] = $_POST['created'];


            $myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
            $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $myPDO->prepare("SELECT author, title, summary, image, body, created FROM entries WHERE id='$id'");
            $stmt->execute();


            if ($stmt) {

            while ($row = $stmt->fetch()) {
                ?>

                <h2>Editing Entry</h2>

                <div class="entry" id="newEntry">
                    <form action="Update.php" method="POST">


                        <label><b>Title</b></label>
                        <input type="text" value="<?php echo $row[title]; ?>" name="title">
                        <br>
                        <label><b>Date</b></label>
                        <input type="date" name="date">
                        <br>
                        <label><b>Author</b></label>
                        <input type="text" value="<?php echo $row[author]; ?>" name="author">
                        <br>
                        <label><b>Image</b></label>
                        <input type="file" name="image" accept="image/*">
                        <br>
                        <label><b>Summary</b></label>
                        <input type="text" value="<?php echo $row[summary]; ?>" name="summary">
                        <br>
                        <label><b>Body</b></label><br>
                        <input type="text" style="width:400px; height: 400px;" name="body"
                               value="<?php echo $row[body]; ?>">

                        <br>

                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <button type="submit" class="btn">Submit</button>

                    </form>

                </div>
                <?php
            }
            ?>

        </div>

        <?php
        }
        ?>

    </div>


    <?php
    require 'sidebar.php'; ?>


    <div class="clear"></div>
    <div class="footer"></div>
    </div>
    </div>
    </body>

    </html>


    <?php

}
?>