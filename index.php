<?php

session_start();

require_once "vendor/autoload.php";

require_once dirname(__FILE__)."/app/config/constants.php";

require_once dirname(__FILE__)."/app/config/routes.php";

use App\Init;

Init::getInstancia($routes);