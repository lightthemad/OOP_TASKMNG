<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UPDATE</title>
</head>
<body>
<form action="<?php  echo '/index.php/users/edituser' ?>" method="post" name="register">

    Nickname:<br>
    <input type="text" name="usernameapd" class="nick">
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
    <br>
    <input type="hidden" value= "<?php echo $_GET['id'] ?>" name= "id">
    <br>
    <input type="submit" value="edit" class="register">
    <br><br>
    <label for="pass" class="passwordErrorMsg"></label>
    <br><br>
    <label for="nick" class="nickErrorMsg"></label>

<!--    <style> .register{display: none} </style>-->

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src=  "/VIEW/JS/registrationValidationScript.js" . ></script>

</body>
</html>