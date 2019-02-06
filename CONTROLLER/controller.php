<?php

include_once 'templating.php';
include_once __ROOT__ . '/MODEL/UserDB.php';

class Controller extends Templating {

    public function home(){
        $this->render('home');
    }

    function reguser(){
        $this->render( 'register');
    }

    public function getUsers()
    {
        $this->render("users");
    }

    function loginUser(){
        $this->render("login");
    }

    function deleteUser(){
        $del = new UserDB();
        $del->deleteUser($_GET['id']);
    }

    function checkUser(){
        $check = new UserDB();
        $check->checkUser($_GET['id']);
    }

    function getUpdate(){
        $this->render("edit");
    }

    function register(){

        if(isset($_POST)){
            $reg = new UserDB();
            $reg->user_name=$_POST['usernamereg'];
            $reg->password=password_hash($_POST['password'], 1);
            $reg->firstname=$_POST['firstname'];
            $reg->lastname=$_POST['lastname'];
            $reg->age=$_POST['age'];
            $reg->img=$_POST['image'];

            if (strlen($_POST['password']) < 6) {
                echo "Password too short!";
                exit();
            }
            if (!preg_match("#[0-9]+#", $_POST['password'])) {
                echo  "Password must include at least one number!";
                exit();
            }
            if (!preg_match("#[a-z]+#", $_POST['password'])) {
                echo  "Password must include at least one lowercase letter!";
                exit();
            }
            if (!preg_match("#[A-Z]+#", $_POST['password'])) {
                echo  "Password must include at least one uppercase letter!";
                exit();
            }
            if($reg->checkUser($reg->user_name)=="no"){
                $reg->signUp();
                $return = new UserDB();
                $return->returnHome();
            }else{
                echo "user exists";
                exit();
            }

        }

    }

    function update(){

        if(isset($_POST)){
            $upd = new UserDB();
            $upd->user_name=$_POST['usernameapd'];
            $upd->password=password_hash($_POST['password'], 1);
            $upd->firstname=$_POST['firstname'];
            $upd->lastname=$_POST['lastname'];
            $upd->age=$_POST['age'];
            $upd->img=$_POST['image'];
            $upd->id=$_POST['id'];
            $upd->update();
            $return = new UserDB();
            $return->returnUsers();

        }
    }

    function login(){
    $log = new UserDB();
    $log->user_name = $_POST['usernamelog'];
    $log->password = $_POST['passwordlog'];
    $log->loginUser();
    $log->returnHome();
    }

    function logoutUser(){
        session_destroy();
        unset($_COOKIE['session']);
        unset($_COOKIE['login']);
        if(isset($_COOKIE['session'])){echo "session set";}else{echo "session unset";};
        setcookie('session', null, -1, '/');
        header('Location: /index.php/');
    }

}


