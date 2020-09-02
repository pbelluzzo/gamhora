<?php

namespace app\src\controller;

use app\src\dao\UserDao;
use app\src\model\UserModel;
use app\core\Request;
use Exception;
use PDOException;

class UserController extends Controller
{
    protected $Dao;

    public function __construct()
    {
        $this->Dao = new UserDao;
    }

    public function register(){
        $user = new UserModel;

        $user->usr_name = Request::post("name");
        $user->usr_password = Request::post("password");
        $user->usr_email = Request::post("email");

        if($this->Dao->checkRegisteredEmail($user)){
            return;
        }

        return $this->Dao->create($user);
    }

    public function deleteUser($id)
    {
        $user = new UserModel;
        $user->setId($id);
        if(!$this->Dao->readById($user)){
            throw new Exception("User not found");
            return;
        } 
        $this->Dao->deleteById($user);
        echo "User removed";
    }

    public function autenticate()
    {
        if($credentials = $this->Dao->readByEmail(Request::post("email"))){
            $this->checkPassword(Request::post("password"), $credentials['usr_password']);
            $this->login();
            return;
        }
        throw new Exception("User not found");
    }

    private function checkPassword($enteredPw, $registeredPw)
    {
        if(!password_verify($enteredPw,$registeredPw)){
            throw new Exception("Incorrect password");
        }
    }

    private function login()
    {
        echo "logged in";
    }
}