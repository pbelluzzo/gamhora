<?php

namespace app\src\model;

use app\src\dao\UserDao;
use Exception;

class UserModel {
    private $name;
    private $password;
    private $email;
    private $isAdmin = 0;

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAdminInfo()
    {
        return $this->isAdmin;
    }

    public function setAdminInfo($value)
    {
        if($value == 0)
        {
            $this->isAdmin = 0;
            return;
        }
        $this->isAdmin = 1;
    }

    public function checkRegisteredEmail()
    {
        $userDao = new UserDao;
        if ($userDao->readByEmail($this->email))
        {
            throw new Exception("Email already registered!");
        }
    }
}