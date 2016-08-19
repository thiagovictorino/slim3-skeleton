<?php


use Monolog\Logger;

$container = $app->getContainer();

/**
 * Logger configurations
 */
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

    $rotate = null;


    if($_ENV["LOG_ROTATE"] == "true"){
        $rotate = "-".date($_ENV['LOG_ROTATE_FORMAT']);
    }

    $file_handler = new \Monolog\Handler\StreamHandler(APP_PATH."/storage/logs/app".$rotate.".log", $level);
    $logger->pushHandler($file_handler);
    return $logger;
};

/**
 * View configs
 */

// Register component on container
$container['view'] = function ($container) {

    $view = new \Slim\Views\Twig(APP_PATH.'/app/views/', [
        'cache' => APP_PATH.'/storage/cache/'
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    return $view;
};