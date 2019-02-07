<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>

<a href="/index.php/users/reg"><button id="register">REGISTER</button></a>
<a href="/index.php/users/log"><button id="login">LOGIN</button></a>

<style> #logout{display: none}</style>
<style> #showusers{display: none}</style>

<?php if(isset($_COOKIE['session']))
{
    session_start();
    ?>
    <a href="/index.php/users/logout" id="logout"><button>LOGOUT</button></a>
    <style> #logout{display: inline; text-decoration: none;}</style>
    <style> #login{display: none}</style>
    <style> #register{display: none}</style>

<?php }; ?>

<?php if(isset($_SESSION['user']))
{
    include_once  "../MODEL/UserDB.php";
    $check = new UserDB();
    if($check -> checkadmin($_SESSION['user'])){
        echo "<a class='btn btn-primary' href='/index.php/users/all'>ADMIN PANEL</a>";
    }
}; ?>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>