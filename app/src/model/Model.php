<?php

namespace app\src\model;


class Model{

    protected $tableName;
    protected $tableColumns = [];
    protected $id;
    protected $prefix;

    public function __get($property)
    {
        return $this->tableColumns[$property];
    }

    public function __set($property,$value)
    {
        $this->tableColumns[$property] = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getPrefix()
    {
        return $this->prefix;
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