<?php

include_once 'templating.php';
include_once  'Service/UserService.php';


class Controller extends Templating
{

    protected $userService;


    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function home()
    {
        $this->render('home');
    }

    function reguser()
    {
        $this->render('register');
    }

    public function getUsers()
    {
        $this->render("users");
    }

    function loginUser()
    {
        $this->render("login");
    }

    function deleteUser()
    {
        $del = new UserDB();
        $del->deleteUser($_GET['id']);
    }

    function checkUser()
    {
        $check = new UserDB();
        $check->checkUser($_GET['id']);
    }

    function checkadmin()
    {
        $check = new UserDB();
        $check->checkadmin($_GET['id']);
    }

    function makeAdmin()
    {
        $adm = new UserDB();
        $adm->makeAdmin($_GET['id']);
    }

    function getUpdate()
    {
        $this->render("edit");
    }

    function register()
    {
        $this->userService->register();
    }

    function update()
    {
        $this->userService->update();
    }

    function login()
    {
        $log = new UserDB();
        $log->user_name = $_POST['usernamelog'];
        $log->password = $_POST['passwordlog'];
        $log->loginUser();
    }

    function logoutUser()
    {
        session_destroy();
        unset($_COOKIE['session']);
        unset($_COOKIE['login']);
        unset($_COOKIE['user']);
        if (isset($_COOKIE['session'])) {
            echo "session set";
        } else {
            echo "session unset";
        };
        setcookie('session', null, -1, '/');
        setcookie("user", NULL, -1, "/");
        header('Location: /index.php/');
    }

}
