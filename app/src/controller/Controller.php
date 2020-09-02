<?php

namespace app\src\controller;

use app\src\dao\UserDao;
use app\src\model\UserModel;
use app\core\Request;
use Exception;
use PDOException;

class Controller 
{
    protected $Dao;

    public function fillObject($model)
    {
        $this->Dao->fetchModel($model);
        return $model;
    }
}