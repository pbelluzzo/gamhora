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
            $dbconfig = self::getIniFile();
            try{
                self::$connection = new PDO("mysql:host=" . $dbconfig['host'] .
             ";dbname=" . $dbconfig['database'] . ";user=" . $dbconfig['user'] . 
             ";password=" . $dbconfig['password']);
            } catch (PDOException $e){
                echo 'Connection failed : ' . $e->getMessage();
            }
        }  
        return self::$connection;
    }
    
    private static function getIniFile(){
        $iniPath = (CORE_PATH . '/env.ini');
        $dbconfig = parse_ini_file($iniPath);
        return $dbconfig;
    }


}