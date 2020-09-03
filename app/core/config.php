<?php
define('ENV_PATH', realpath(dirname(__FILE__,3)));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../src/view'));
define('MODEL_PATH', realpath(dirname(__FILE__) . '/../src/model'));
define('DAO_PATH', realpath(dirname(__FILE__) . '/../src/dao'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../src/controller'));
define('STYLES_PATH', realpath(dirname(__FILE__) . '/../../public/styles'));
define('CORE_PATH', realpath(dirname(__FILE__)));
define('JS_PATH', realpath(dirname(__FILE__) . '/../../public/js'));
define('BASE_URL', "http://127.0.0.1/gamhora/public");