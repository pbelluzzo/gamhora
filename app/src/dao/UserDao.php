<?php

namespace app\src\dao;

use app\core\QueryBuilder;
use app\src\model\UserModel;
use app\src\dao\Dao;
use PDO;
use PDOException;

class UserDao extends Dao
{
    protected $connection;

    public function readByEmail(UserModel $model)
    {
        $email = $model->usr_email;
        $filter = $model->getPrefix() . 'email' . ' = :email';
        $statement = $this->connection->prepare(QueryBuilder::buildSelect($model->getTableName(),"*",$filter));
        $statement->bindParam(':email', $email);
        $statement->execute();
        $queryResult = $statement->fetch(PDO::FETCH_ASSOC);
        return $queryResult;
    }

    public function checkRegisteredEmail(UserModel $model)
    {
        if ($this->readByEmail($model)){
            throw new PDOException("Email already registered!");
            return true;
        }
        return false;
    }
}
