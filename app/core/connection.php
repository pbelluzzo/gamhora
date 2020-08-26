<?php

namespace app\core;

use PDO;
use PDOException;


class Connection {

    public static $connection;

    public static function getInstance()
    {
        if (!isset(self::$connection))
        {
            self::$connection = new Connection;
        }  
        return self::$connection;
    }

    private function __construct(){
        return $this->connect();
    }

    private function connect(){
        $dbconfig = $this->getIniFile();
        try{
            $connection = new PDO("mysql:host=" . $dbconfig['host'] .
         ";dbname=" . $dbconfig['database'] . ";user=" . $dbconfig['user'] . 
         ";password=" . $dbconfig['password']);
        } catch (PDOException $e){
            echo 'Connection failed : ' . $e->getMessage();
        }
        return $connection;
    }
    
    private function getIniFile(){
        $iniPath = (CORE_PATH . '/env.ini');
        $dbconfig = parse_ini_file($iniPath);
        return $dbconfig;
    }


}