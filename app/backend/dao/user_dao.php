<?php

namespace app\backend\dao;

use app\core\Connection;
use app\backend\model\UserModel;
use PDO;

class UserDao {
    
    private $connection;

    public function __construct(){
        $connection = Connection::getInstance();
    }

    public function create(UserModel $userModel){
        $statement = $this->connection->prepare("INSERT INTO TBL_USERS (usr_name, usr_password, usr_email, usr_isAdmin) VALUES (:name, :password, :email, :isAdmin);");
        $statement->bindParam(':name', $userModel->getName());
        $statement->bindParam(':password', $userModel->getPassword());
        $statement->bindParam(':email', $userModel->getEmail());
        $statement->bindParam(':isAdmin', $userModel->getAdminInfo());
        return $statement->execute();
    }
    
    public function readById($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM TBL_USERS WHERE usr_id = :id");
        $statement->bindParam(':id', $id);
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