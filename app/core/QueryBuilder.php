<?php

namespace app\core;

class QueryBuilder{

    public static function buildSelect($table, $fields = "*", $filters = "true")
    {
    $sql = "SELECT ${fields} FROM ${table} WHERE 1 = 1 AND ${filters};";
    return $sql;
    }

    public static function buildInsert($table, $tableFields, $values)
    {
    $sql = "INSERT INTO ${table} (${tableFields}) VALUES (${values});";
    return $sql;
    }

    public static function buildDelete($table, $filters)
    {
    $sql = "DELETE FROM ${table} WHERE ${filters};";
    return $sql;
    }
}