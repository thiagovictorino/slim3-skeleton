<?php
define('APP_PATH', __DIR__ . '/../../');

require APP_PATH . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(APP_PATH);
$dotenv->load();


$config = require APP_PATH . "/app/config/general.php";
$config['db'] = require APP_PATH . "/app/config/database.php";

$app = new \Slim\App(["settings" => $config]);


