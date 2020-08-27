<?php

namespace app\src\controller;

use app\src\dao\UserDao;
use app\src\model\UserModel;
use Exception;
use PDOException;

class UserController{

    private $userDao;

    public function __construct(){
        $this->userDao = new UserDao;
    }

    public function register(){
        $user = new UserModel;

        $user->setName($_POST["name"]);
        $user->setPassword($_POST["password"]);
        $user->setEmail($_POST["email"]);

        $user->checkRegisteredEmail();

        return $this->userDao->create($user);
    }

    public function deleteUser($id)
    {
        try{
            $this->userDao->deleteById($id);
        } catch (PDOException $e){
            echo 'Failed : ' . $e->getMessage();
        }
        echo "User removed";
    }

    public function autenticate()
    {
        if($credentials = $this->userDao->readByEmail($_POST["email"]))
        {
            $this->checkPassword($_POST["password"], $credentials['usr_password']);
            $this->login();
            return;
        }
        throw new Exception("User not found");
        
    }

    private function checkPassword($enteredPw, $registeredPw)
    {
        if(!password_verify($enteredPw,$registeredPw))
        {
            throw new Exception("Incorrect password");
        }
    }

    private function login()
    {
        echo "logged in";
    }

}