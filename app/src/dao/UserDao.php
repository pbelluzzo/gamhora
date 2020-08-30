<?php

namespace app\src\dao;

use app\src\model\UserModel;
use app\src\dao\Dao;
use PDO;

class UserDao extends Dao{
    
    protected $connection;
    
    public function readById($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM TBL_USERS WHERE usr_id = :id");
        $statement->bindParam(':id', $id);
        $statement->execute();
        $queryResult = $statement->fetch(PDO::FETCH_ASSOC);
        return $queryResult;
    }

    public function readByEmail($email)
    {
        $statement = $this->connection->prepare("SELECT * FROM TBL_USERS WHERE usr_email = :email");
        $statement->bindParam(':email', $email);
        $statement->execute();
        $queryResult = $statement->fetch(PDO::FETCH_ASSOC);
        return $queryResult;
    }
    
    public function deleteById($id)
    {
        $statement = $this->connection->prepare("DELETE FROM TBL_USERS WHERE usr_id = :id");
        $statement->bindParam(':id', $id);
        return $statement->execute();
    }
}
