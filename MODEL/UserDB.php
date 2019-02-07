<?php

include_once "DBConnection.php";

class UserDB extends DBConnection
{

    public $user_name;
    public $password;
    public $firstame;
    public $lastname;
    public $age;
    public $img;
    public $id;

    public function __construct($user_name = "x", $password="x", $firstame='x', $lastname='x', $age='0', $img='x', $id='x')
    {
        $this->user_name = $user_name;
        $this->password = $password;
        $this->firstame = $firstame;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->img = $img;
        $this->id=$id;

        parent::__construct();

    }

    public function selectAll()
    {

        $sql = "select id, user_name, image from users";
        $result = $this->conn->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $users = $result->fetchAll();
        return $users;

    }

    public function signUp()
    {
        return $this->conn->query("insert into users(user_name,password,first_name,last_name,age,image)
          VALUES('$this->user_name' , '$this->password', '$this->firstame', '$this->lastname','$this->age', 
          '$this->img')");
    }

    public function deleteUser($id){
        $query = "DELETE FROM users
                    WHERE id = ".$id;
        $result = $this->conn->query($query);
    }

    public function makeAdmin($id){
        $query = "update users set isadmin = 1
                    WHERE id = ".$id;
        $result = $this->conn->query($query);
    }

    public function update(){
        return $this->conn->query("update users SET first_name = '$this->firstame',last_name = '$this->lastname',
    user_name = '$this->user_name',password = '$this->password',age = '$this->age', image = '$this->img' where 
    id = $this->id");
    }

    public function checkUser($id){
        $query = "select * FROM users
                    WHERE user_name ="."'$id'";

        $result = $this->conn->query($query);

        $count = count($result->fetchAll(PDO::FETCH_ASSOC));

        if($count>0){
            echo "yes";
        }else{
            echo "no";
        }

        if($count>0){
            return "yes";
        }else{
            return "no";
        }
    }

    public function checkadmin($id){
        $query = "select isadmin FROM users
                    WHERE user_name ="."'$id'";

        $result = $this->conn->query($query);

        $final = $result->fetchAll(PDO::FETCH_ASSOC);

        if($final[0]['isadmin'] == 0){
            return FALSE;
        }else{
            return TRUE;
        }

    }

    public function loginUser(){

        $query = "select password from users where user_name = '$this->user_name'";
        $result = $this->conn->query($query);
        $fetch = $result->fetchAll(PDO::FETCH_ASSOC);
        $hash = $fetch[0]['password'];

        if(password_verify($this->password, $hash)){
            setcookie("session", "sessionstart", time() + 1999, "/");
            session_start();
            $_SESSION['user'] = $this->user_name;
            if(isset($_POST['remember'])){
                setcookie('login', "$this->user_name", time() + 160, "/");
                $this->returnHome();
            }
            $this->returnHome();
        }
        else{
            echo "Incorrect Username/Password";
        }

    }

    public function returnHome(){
        header('Location: /index.php/');
    }

    public function returnUsers(){
        header('Location: /index.php/users/all');
    }

}


