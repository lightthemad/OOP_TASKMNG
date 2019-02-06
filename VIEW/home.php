<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>

<a href="/index.php/users/reg"><button id="register">REGISTER</button></a>
<a href="/index.php/users/log"><button id="login">LOGIN</button></a>
<a href="/index.php/users/all"><button id="showusers">ShowMeUsers</button></a>

<style> #logout{display: none}</style>

<?php if(isset($_COOKIE['session']))
     {
         session_start();
     ?>
<a href="/index.php/users/logout" id="logout"><button>LOGOUT</button></a>
<style> #logout{display: inline; text-decoration: none;}</style>
<style> #login{display: none}</style>
<style> #register{display: none}</style>

<?php }; ?>

