<?php

namespace app\src\dao;

use app\core\Connection;
use app\core\QueryBuilder;
use app\src\model\Model;

class Dao {

    protected $connection;

    public function __construct(){
        $this->connection = Connection::getInstance();
    }

    public function create(Model $model){
        $values = $this->createInsertValues($model);
        $statement = $this->connection->prepare(QueryBuilder::buildInsert($model->getTableName(), $this->stringTableColumns($model), $values));
        $this->bindInsertParams($statement, $model);
        var_dump($statement);
        return $statement->execute();
    }

    private function stringTableColumns($model)
    {
        $columnsString = implode(",",$model->getTableColumns());
        return $columnsString;
    }

    private function createInsertValues($model)
    {
        $bindColumns = '';
        foreach($model->getTableColumns() as $column)
        {
            $bindColumns .= ":${column},";
        }
        $bindColumns = substr($bindColumns,0,-1);
        return $bindColumns;
    }

    private function bindInsertParams($statement, $model)
    {
        $value = '';
        foreach($model->getTableColumns() as $tableColumn)
        {
            $value = $model->$tableColumn;
            $statement->bindParam(":${tableColumn}", $value);
        }
    }
    
}