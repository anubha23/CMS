<?php
// start session. We'll use this when we have user authentication
session_start();

// This will be used to construct urls.
DEFINE('BASE_PATH', dirname($_SERVER['SCRIPT_NAME']));
DEFINE('BASE_URL', $_SERVER['SCRIPT_NAME']. '/');

// Now, we load our framework
include_once('./framework.php');

// Instantiate it
$app = new App();
$app->init();
