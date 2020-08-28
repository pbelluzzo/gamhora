<?php

namespace app\src\dao;

use app\core\QueryBuilder;

class Dao {
    protected $tableName;
    protected $tableFields = [];

    public function create($model){
        $values = $this->createInsertValues();
        $statement = $this->connection->prepare(QueryBuilder::buildInsert($this->tableName, $this->tableFields, $values));
        $this->bindInsertParams($statement, $model);
        return $statement->execute();
    }

    private function createInsertValues()
    {
        $value = '';
        foreach($this->tableFields as $tableField)
        {
            $value .= ":${tableField},";
        }
        $value = substr($value,0,-1);
        return $value;
    }

    private function bindInsertParams($statement, $model)
    {
        foreach($this->tableFields as $tableField)
        {
            $statement->bindParam(":${tableField}", $model->$tableField);
        }
    }
}