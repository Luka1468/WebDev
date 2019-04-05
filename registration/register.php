<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register New User</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<form action="register.php" method="POST">

    <div id="content">
        <h1>Registration</h1>

        First Name: <input type="text" name="firstName" maxlength="50" value="<?php echo $firstName; ?>" required>
        <br>
        <br>
        First Name: <input type="text" name="lastName" maxlength="50" value="<?php echo $lastName; ?>" required>
        <br><br>
        Email: <input type="email" name="email" value="<?php echo $email; ?>" required>
        <br>
        <br>
        Password: <input type="password" name="password1" maxlength="20">
        <br>
        <br>

        Confirm Password: <input type="password" name="password2">
        <br>
        <br>

        <input type="submit" name="register" value="Submit">


    </div>
</form>

</body>
</html>
