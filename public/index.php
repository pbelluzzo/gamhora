<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamhora</title>
</head>
<body>
<?php

use app\src\controller\UserController;

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../app/core/config.php";
require __DIR__ . "/../app/core/connection.php";
?>


<?php
$_POST["name"] = "pedro";
$_POST["password"] = "senha";
$_POST["email"] = "pedrobelluzzo";
$controller = new UserController;
//$controller->autenticate();
//$controller->deleteUser(8);
?>


</body>
</html>