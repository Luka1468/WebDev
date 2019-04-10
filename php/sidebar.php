<!-- the sidebar to the main program, this is where the login information is passed to the login.php, this page is added included inside of the main page -->
<div class="sidebar">

    <!-- the social media section -->
    <div class="social">
        <img id="vlad" src="../pictures/vlad.JPG" width="100" height="100">

        <h4>Social Media</h4>

        <div style=" text-align: center;">
            <a href="http/www.twitter.com"><img src="../pictures/twitter.png" height="15%" width="15%"></a>
            <a href="http/www.facebook.com"><img src="../pictures/facebook.jpg" height="15%" width="15%"></a>
            <a href="http/www.instagram.com"><img src="../pictures/insta.png" height="15%" width="15%"></a>
            <a href="http/www.twitter.com"><img src="../pictures/youtube.png" height="15%" width="15%"></a>
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
            
            //selected by description
            $stmt = $myPDO->prepare("SELECT * FROM entries ORDER BY created DESC LIMIT 4");
            $stmt->execute();

            if ($stmt) {

                while ($posts = $stmt->fetch()) {
                    ?>
                    //display the post's
                    <div id="post1" style="text-align: center; font-size: 20px; margin: 5px;"><a href="Entry.php?id=<?
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
            <form action="../users/login.php" method="POST">

                <label><b>Username</b></label>
                <input type="text" placeholder="" name="username" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="" name="password" required>

                <button type="submit" class="btn">Login</button>
                <button type="submit" class="btn" onclick="openLoginForm()">Cancel</button>
            </form>
        </div>

        <div class="register-form" id="registerForm" style="display:none">
            <form action="../users/register.php" method="POST">

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
        //if user is not looged in stay on the page and display register and login
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
        //
        if (isset($_SESSION['user'])) {
            echo "Logged in " . $_SESSION['user'] . "<br>";
            echo "<br><a href='../NewEntry.html'><button>New Post</button></a><br>";

            echo "<br><a href='logout.php'><button name=\"logout\">Logout</button></a>";

        }
        ?>
        <script type="text/javascript" src="../js/form.js"></script>


    </div>
</div>
