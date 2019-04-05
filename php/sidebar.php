<div class="sidebar">

    <!-- the social media section -->
    <div class="social">
        <img id="vlad" src="../pictures/vlad.JPG" width="100" height="100">

        <h4>Social Media</h4>

        <div style=" text-align: center;">
            <a href="http/www.twitter.com"><img src="pictures/twitter.png" height="15%" width="15%"></a>
            <a href="http/www.facebook.com"><img src="pictures/facebook.jpg" height="15%" width="15%"></a>
            <a href="http/www.instagram.com"><img src="pictures/insta.png" height="15%" width="15%"></a>
            <a href="http/www.twitter.com"><img src="pictures/youtube.png" height="15%" width="15%"></a>
        </div>
        <!--end of the social media box  -->
    </div>

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
