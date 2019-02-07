<?php

include_once __ROOT__ . '/MODEL/UserDB.php';


class UserService
{
    public function register()
    {
        if (isset($_POST)) {
            $reg = new UserDB();
            $reg->user_name = $_POST['usernamereg'];
            $reg->password = password_hash($_POST['password'], 1);
            $reg->firstname = $_POST['firstname'];
            $reg->lastname = $_POST['lastname'];
            $reg->age = $_POST['age'];
            $reg->img = $_POST['image'];

            if (strlen($_POST['password']) < 6) {
                echo "Password too short!";
                exit();
            }
            if (!preg_match("#[0-9]+#", $_POST['password'])) {
                echo "Password must include at least one number!";
                exit();
            }
            if (!preg_match("#[a-z]+#", $_POST['password'])) {
                echo "Password must include at least one lowercase letter!";
                exit();
            }
            if (!preg_match("#[A-Z]+#", $_POST['password'])) {
                echo "Password must include at least one uppercase letter!";
                exit();
            }
            if ($reg->checkUser($reg->user_name) == "no") {
                $reg->signUp();
                $return = new UserDB();
                $return->returnHome();
            } else {
                echo "user exists";
                exit();
            }

        }
    }

    public  function update(){
        if (isset($_POST)) {
            $upd = new UserDB();
            $upd->user_name = $_POST['usernameapd'];
            $upd->password = password_hash($_POST['password'], 1);
            $upd->firstname = $_POST['firstname'];
            $upd->lastname = $_POST['lastname'];
            $upd->age = $_POST['age'];
            $upd->img = $_POST['image'];
            $upd->id = $_POST['id'];
            $upd->update();
            $return = new UserDB();
            $return->returnUsers();

        }
    }


}