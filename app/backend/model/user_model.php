<?php

namespace app\backend\model;

class UserModel {
    private $name;
    private $password;
    private $email;
    private $isAdmin;

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($value)
    {
        $this->name = $value;
    }

    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($value)
    {
        $this->password = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($value)
    {
        $this->email = $value;
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
}