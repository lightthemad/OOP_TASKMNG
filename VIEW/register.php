<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>REGISTER</title>
</head>
<body>
<form action="<?php  echo '/index.php/users/register' ?>" method="POST" name="register">

    Nickname:<br>
    <input type="text" name="usernamereg" class="nick">
    <br>
    Password:<br>
    <input type="password" name="password" class="pass">
    <br>
    First name:<br>
    <input type="text" name="firstname">
    <br>
    Last name:<br>
    <input type="text" name="lastname">
    <br>
    Age:<br>
    <input type="text" name="age">
    <br>
    Image:
    <input type="file" name="image" value="your image">
    <br><br>
    <input type="submit" value="Submit" class="register">
    <br><br>
    <label for="pass" class="passwordErrorMsg"></label>
    <br><br>
    <label for="nick" class="nickErrorMsg"></label>

    <style> .register{display: none} </style>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src= <?php __ROOT__ . "/VIEW/JS/registrationValidationScript.js"?>></script>

</body>
</html>
