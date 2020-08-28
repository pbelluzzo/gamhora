<?php
require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../app/core/config.php";
require __DIR__ . "/../app/core/connection.php";

use app\src\controller\UserController;

$_POST["name"] = "pedro";
$_POST["password"] = "senha";
$_POST["email"] = "pedrobelluzzo";
$controller = new UserController;

$controller->register();
//$controller->autenticate();
//$controller->deleteUser(8);


