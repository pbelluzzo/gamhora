<?php

namespace app\src\model;

use app\src\model\Model;
use app\src\dao\UserDao;
use Exception;

class UserModel extends Model 
{
    protected $tableName = "tbl_users";
    protected $tableColumns = ['usr_name' => '', 'usr_password' => '', 'usr_email' => '', 'usr_isAdmin' => 0];
    protected $id;
    protected $prefix = 'usr_';

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