<?php namespace App\Controller;
use Slim\Container;

/**
 * Created by PhpStorm.
 * User: thiagovictorino
 * Date: 8/18/16
 * Time: 22:36
 */
abstract class BaseController
{

    protected $logger;

    public function __construct(Container $container)
    {
        $this->logger = $container["logger"];

    }

}