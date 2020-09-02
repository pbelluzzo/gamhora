<?php

namespace app\src\dao;

use app\core\QueryBuilder;
use app\src\model\ProjectModel;
use app\src\dao\Dao;
use PDO;

class ProjectDao extends Dao
{
    protected $connection;

    public function readByAuthor($model)
    {
        $author_id = $model->prj_author_id;
        $filter = $model->getPrefix() . 'author_id' . ' = :author_id';
        $statement = $this->connection->prepare(QueryBuilder::buildSelect($model->getTableName(),"*",$filter));
        $statement->bindParam(':author_id', $author_id);
        $statement->execute();
        $queryResult = $statement->fetch(PDO::FETCH_ASSOC);
        return $queryResult;
    }
    
}
