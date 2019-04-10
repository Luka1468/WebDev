<!--
The About me Page is a page that will display what the website is really about and who and why the creator's created the website.
 This page also includes a way to connect to the main developer, and ask questions and to send improvments/bugs
-->
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
            <h1>About Me!</h1>


            <div class="borders">
                <h2>Vlad the Impaler</h2>

                <div class="borders">
                    <div class="side looks"> </div>
                    <img src="pictures/vlad.JPG" width="300" height="300">
                    <span class="side looks"><h2 >My Origin</h2>
            <p style="display: inline-block; position: relative;">
                I am a hard working individual who plans to annex crimea from ukrane and to take and pillage
                all of the people who are not happy have to be happy because I plan to re- create the soviet union and become the biggest country
                in the world again
            </p>
            <h1> What do I do For a Living ?</h1>
                <p>
            I'm a paragraph.  I enjoy riding bears and holding dogs, I love annexing countries without the eu doing anything about it. Another thing
                        I enjoy is the ability to do anythihng I want, because I am the king of the slavs and they should look up to the slavic kingdom



                    <h2>My Desires to concur the world </h2>
                    <p> I am a hard working individual how tries to do the best for my country without having any politcal implications. I am very smart and stratigic
                        I support my fellow Slavic countries and hope that the prosper and do well against the odds that are to come.
                        </p>
</span>

                    <div>
                        <form action="php/contactConfirm.php" method="post">
                            <h2>Contact Me</h2>
                            <p>
                                If you want to contact me
                            </p>
                            <label> Name:</label><input type="text" required name="name"><br>
                            <label>Email:</label><input type="email" required name="email"><br>
                            <label>Context of the Question</label><br><textarea type="textArea" name="message"></textarea>
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>


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
            // connecting to the server
            try {
                $myPDO = new PDO('mysql:host=localhost;dbname=sunjingw_week11', $user, $passwd);
                $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $myPDO->prepare("SELECT * FROM entries");
                $stmt->execute();
                // Fetching the posts for the sidebar
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
