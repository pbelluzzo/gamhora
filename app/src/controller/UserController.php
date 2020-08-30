<?php

namespace app\src\controller;

use app\src\dao\UserDao;
use app\src\model\UserModel;
use app\core\Request;
use Exception;
use PDOException;

class UserController{

    private $userDao;

    public function __construct(){
        $this->userDao = new UserDao;
    }

    public function register(){
        $user = new UserModel;

        $user->usr_name = Request::post("name");
        $user->usr_password = Request::post("password");
        $user->usr_email = Request::post("email");

        $user->checkRegisteredEmail();

        return $this->userDao->create($user);
    }

    public function deleteUser($id)
    {
        $user = new UserModel;
        $user->setId($id);
        if(!$this->userDao->readById($user))
        {
            throw new Exception("User not found");
            return;
        }

        try{
            $this->userDao->deleteById($user);
        } catch (PDOException $e){
            echo 'Failed : ' . $e->getMessage();
        }
        echo "User removed";
    }

    public function autenticate()
    {
        if($credentials = $this->userDao->readByEmail(Request::post("email")))
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