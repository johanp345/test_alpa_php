<?php
require "autoload.php";
App\Helpers\Helpers::LoadEnv();
App\Controllers\AppController::runApp($argv);
