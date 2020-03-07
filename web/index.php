<?php

session_start();

define('_WEBDIR_',  __DIR__);
require __DIR__.'/../autoload.php';

$config = require __DIR__ . '/../config/config.php';

//require __DIR__.'/../views/layouts/admin.php';
(new vendor\components\Application($config))->start();