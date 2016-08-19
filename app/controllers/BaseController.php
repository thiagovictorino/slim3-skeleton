<?php

/**
 * Created by PhpStorm.
 * User: thiagovictorino
 * Date: 8/18/16
 * Time: 22:36
 */

namespace App\Controller;

use Monolog\Logger;
use Slim\Container;

abstract class BaseController
{

    /**
     * @var Logger $logger
     */
    protected $logger;
    protected $view;

    public function __construct(Container $container)
    {
        $this->logger = $container["logger"];
        $this->view = $container["view"];

    }

}