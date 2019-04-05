<?php
session_start();
?>


<?php
include 'php/connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <meta charset="utf-8">
<body>
<body>

<div class="container">
    <!-- the top of the website where the logo or title/ some navigations can be like top trending, latest news... -->
    <!-- fixed position top left -->
    <div class="header">

        <!-- logo of the blog -->
        <a href="index.php"><img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Facebook_logo_%28square%29.png"
                                    width="80" height="80"></a>


        <div class="nav">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="">Top 10 Conquests</a>
                    <ul>
                        <li><a href="">Ukraine</a></li>
                        <li><a href="">Yugoslavia</a></li>
                        <li><a href="">USA</a></li>
                    </ul>
                </li>
                <li><a href="">Future Conquests</a>
                    <ul>
                        <li><a href="">Romania</a></li>
                        <li><a href="">France</a></li>
                        <li><a href="">Germany</a></li>

                    </ul>
                </li>
                <li><a href="">Contact</a></li>
                <li><a href="">About Me</a>

                </li>
            </ul>
        </div>


    </div>


<div class="content">
    <div class="main">
            <?

            try {

                $myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
                $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $myPDO->prepare("SELECT * FROM entries");
                $stmt->execute();

                if ($stmt) {

                    while ($posts = $stmt->fetch()) {

                        ?>
                        <div class="titlearea">
                            <h1 style="margin: 5px; padding: 0;"><?php echo $posts['title']; ?></h1>
                            <h4 style="margin: 5px; padding: 0;"><?php echo $posts['created']; ?></h4>
                            <h4 style="margin: 5px; padding: 0;">By <?php echo $posts['author']; ?></h4>
                        </div>

                        <a href="php/post.php?id=<?
                        echo $posts[id]; ?>"><img src="<?php echo 'pictures/' . $posts['image']; ?>" width="85%"
                                                  height="60%"></a>

                        <p style="font-size: 15px;"><?php echo $posts['summary']; ?></p>

                        <br><br>
                        <p></p>

                        <?php
                    }
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $myPDO = null;

            ?>

        </div>
    </div>

    <div class="sidebar">

        <!-- the social media section -->
        <div class="social">
            <img id="vlad" src="pictures/vlad.JPG" width="100" height="100">

<br>
                <div class="icons">
                    <a href="http/www.twitter.com"><img src="pictures/twitter.png" height="20px;" width="20px;"></a>
                    <a href="http/www.facebook.com"><img src="pictures/facebook.jpg" height="21px;" width="40px;"></a>
                    <a href="http/www.instagram.com"><img src="pictures/insta.png" height="20px;" width="20px;"></a>
                    <a href="http/www.twitter.com"><img src="pictures/youtube.png" height="20px;" width="20px;"></a>
                </div>
        </div>




            <!--end of the social media box  -->


        <!-- start of the Featured section -->
        <div class="features">
            <h1>Recent Posts</h1>
            <?
            try {
                $myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
                $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $myPDO->prepare("SELECT * FROM entries");
                $stmt->execute();

                if ($stmt) {

                    while ($posts = $stmt->fetch()) {
                        ?>

                        <div id="post1" style="text-align: center; font-size: 20px; margin: 5px;"><?php echo $posts['title']; ?></div>


                        <?php
                    }
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $myPDO = null;

            ?>

        </div>
        <div class="login">
            <form action="../index.php" method="POST">
                <h2>Login</h2>
                <input type="text" name="username" placeholder="Username">
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <button class="btn" type="submit" name="login">Sign in</button>
            </form>
        </div>

    </div>


    <div class="clear"></div>
    <div class="footer"></div>

</body>
</html>