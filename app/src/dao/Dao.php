<?php

namespace app\src\dao;

use app\core\Connection;
use app\core\QueryBuilder;
use app\src\model\Model;
use PDO;
use PDOException;

class Dao 
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    public function fetchModel(Model $model)
    {
        $dbRegistry = $this->readById($model);
        foreach ($dbRegistry as $key => $value){
            $model->$key = $value;
        }
        return $model;
    }

    public function create(Model $model)
    {
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
        foreach($model->getTableColumns() as $column){
            $bindColumns .= ":${column},";
        }
        $bindColumns = substr($bindColumns,0,-1);
        return $bindColumns;
    }

    private function bindInsertParams($statement, $model)
    {
        $value = [];
        $i=0;
        foreach($model->getTableColumns() as $tableColumn){
            $value[$i] = $model->$tableColumn;
            var_dump($value[$i]);
            var_dump($tableColumn);
            echo "<br>";
            $statement->bindParam(":" . $tableColumn, $value[$i]);
            $i ++;            
        }
    }

    public function readById($model)
    {
        $id = $model->getId();
        $filter = $model->getPrefix() . 'id' . ' = :id';
        $statement = $this->connection->prepare(QueryBuilder::buildSelect($model->getTableName(),"*",$filter));
        $statement->bindParam(':id', $id);
        $statement->execute();
        $queryResult = $statement->fetch(PDO::FETCH_ASSOC);
        return $queryResult;
    }
    
    public function deleteById($model)
    {
        $id = $model->getId();
        $filter = $model->getPrefix() . 'id' . ' = :id';
        $statement = $this->connection->prepare(QueryBuilder::buildDelete($model->getTableName(), $filter));
        $statement->bindParam(":id", $id);
        return $statement->execute();
    }
}