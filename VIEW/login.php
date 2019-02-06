<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
</head>
<body>
<form action="<?php  echo '/index.php/users/loginuser' ?>" method="post" name="login">


    Nickname:<br>
    <input type="text" name="usernamelog" value="<?php echo $_COOKIE['login'] ?>">
    <br>
Password:<br>
    <input type="password" name="passwordlog">
    <br><br>
    <input type="submit" value="Submit">
    <br><br>
    <input type="checkbox" name="remember">
    <label for="checkbox">Remember me</label>
</form>


</body>
</html>