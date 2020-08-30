<?php

namespace app\src\model;


class Model{

    protected $tableName;
    protected $tableColumns = [];
    protected $id;

    public function __get($property)
    {
        return $this->tableColumns[$property];
    }

    public function __set($property,$value)
    {
        $this->tableColumns[$property] = $value;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function getTableColumns()
    {
        return array_keys($this->tableColumns);
    }

    public function getTableColumnsValues()
    {
        return $this->tableColumns;
    }
}