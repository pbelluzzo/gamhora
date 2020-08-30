<?php

namespace app\src\dao;

use app\core\QueryBuilder;
use app\src\model\UserModel;
use app\src\dao\Dao;
use PDO;

class UserDao extends Dao{
    
    protected $connection;

    public function readByEmail($model)
    {
        $email = $model->usr_email;
        $filter = $model->getPrefix() . 'email' . ' = :email';
        $statement = $this->connection->prepare(QueryBuilder::buildSelect($model->getTableName(),"*",$filter));
        $statement->bindParam(':email', $email);
        $statement->execute();
        $queryResult = $statement->fetch(PDO::FETCH_ASSOC);
        return $queryResult;
    }
    
}
