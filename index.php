<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('__ROOT__', __DIR__);

include_once 'lib/router.php';

$route=new Rout();
$route->router('/', ['controller.php', 'home']);
$route->router('/users/all', ['controller.php', 'getUsers']);
$route->router('/users/reg', ['controller.php', 'regUser']);
$route->router('/users/delete', ['controller.php', 'deleteUser']);
$route->router('/users/update', ['controller.php', 'getUpdate']);
$route->router('/users/log', ['controller.php', 'loginUser']);
$route->router('/users/check', ['controller.php', 'checkUser']);
$route->router('/users/logout', ['controller.php', 'logoutUser']);
$route->router('/users/register', ['controller.php', 'register']);
$route->router('/users/registeruser', ['controller.php', 'update']);
$route->router('/users/loginuser', ['controller.php', 'login']);