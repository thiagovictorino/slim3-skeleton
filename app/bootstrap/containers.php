<?php


use Monolog\Logger;

$container = $app->getContainer();

$container['logger'] = function($c) {
    $logger = new Logger('log');

    $level = null;

    switch ($_ENV["LOG_LEVEL"]){

        case "INFO":
            $level = Logger::INFO;
            break;
        case "NOTICE":
            $level = Logger::NOTICE;
            break;
        case "WARNING":
            $level = Logger::WARNING;
            break;
        case "ERROR":
            $level = Logger::ERROR;
            break;
        case "CRITICAL":
            $level = Logger::CRITICAL;
            break;
        case "ALERT":
            $level = Logger::ALERT;
            break;
        case "EMERGENCY":
            $level = Logger::EMERGENCY;
            break;
        default:
            $level = Logger::DEBUG;


    }

    $file_handler = new \Monolog\Handler\StreamHandler(APP_PATH."/storage/logs/app.log", $level);
    $logger->pushHandler($file_handler);
    return $logger;
};