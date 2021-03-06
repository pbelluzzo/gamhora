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
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }  
        return self::$connection;
    }
    
    private static function getIniFile(){
        $iniPath = (ENV_PATH . '/env.ini');
        $dbconfig = parse_ini_file($iniPath);
        return $dbconfig;
    }


}