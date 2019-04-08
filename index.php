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

    <script type="text/javascript" src="js/form.js"></script>

<body>
<body>

<div class="container">
    <!-- the top of the website where the logo or title/ some navigations can be like top trending, latest news... -->
    <!-- fixed position top left -->
    <div class="header">

        <!-- logo of the blog -->
        <a href="index.php"><img class="logo"
                                 src="https://seeklogo.com/images/R/Russia-logo-BC336FF7A3-seeklogo.com.png"
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
                <li><a href="AboutMe.php">Contact</a></li>
                <li><a href="AboutMe.php">About Me</a>

                </li>
            </ul>
        </div>


    </div>


    <div class="content">
        <div class="main">

            <?php
            try {

                $myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
                $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $myPDO->prepare("SELECT * FROM entries ORDER BY created DESC LIMIT 2");
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


            ?>
            <a href="index.php" onclick="<?php ?>">Next Page</a>

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

                $stmt = $myPDO->prepare("SELECT * FROM entries ORDER BY created DESC LIMIT 4");
                $stmt->execute();

                if ($stmt) {

                    while ($posts = $stmt->fetch()) {
                        ?>

                        <div id="post1" style="text-align: center; font-size: 16px; margin: 3px;"><a
                                    href="php/Entry.php?id=<?
                                    echo $posts[id]; ?>"><?php echo $posts['title']; ?></a></div>


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

            <div class="login-form" id="myForm" style="display:none">
                <form action="users/login.php" method="POST">

                    <label><b>Username</b></label>
                    <input type="text" placeholder="" name="username" required>

                    <label><b>Password</b></label>
                    <input type="password" placeholder="" name="password" required>

                    <button type="submit" class="btn">Login</button>
                    <button type="submit" class="btn" onclick="openLoginForm()">Cancel</button>
                </form>
            </div>

            <div class="register-form" id="registerForm" style="display:none">
                <form action="users/register.php" method="POST">

                    <h4>Registration</h4>

                    <label><b>Username</b></label>
                    <input type="text" name="username" maxlength="30" value="" required>
                    <label><b>Email</b></label>
                    <input type="email" name="email" maxlength="30" value="" required>
                    <label><b>Password</b></label>
                    <input type="password" name="password" maxlength="20" required>


                    <button type="submit" class="btn">Submit</button>
                    <button type="submit" class="btn" onclick="openRegisterForm()">Cancel</button>
                </form>
            </div>

            <?php
            if (!isset($_SESSION['user'])) {
                ?>
                <div id="buttons" style="display:block">
                    <button name="register" onclick="openRegisterForm()">Register</button>
                    <button name="login" onclick="openLoginForm()">Login</button>
                </div>
                <?php

            }
            ?>

            <?php
            if (isset($_SESSION['user'])) {
                echo "Logged in as ".$_SESSION['user']."<br>";
                echo "</><br><a href='NewEntry.html'><button>New Post</button></a><br>";
                echo "<br><a href='php/logout.php'><button name='logout'>Logout</button></a>";
            }

            ?>


        </div>
    </div>


    <div class="clear"></div>
    <div class="footer"></div>
</div>

</body>
</html>

<?php


    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        session_destroy();
    }
    ?>
