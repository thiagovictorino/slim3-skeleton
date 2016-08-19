<?php namespace App\Controller;

/**
 * Created by PhpStorm.
 * User: thiagovictorino
 * Date: 8/18/16
 * Time: 22:36
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Container;

class HomeController extends BaseController
{

    public function __construct(Container $container)
    {
        parent::__construct($container);

        $this->logger->setPrefix(self::class);

    }

    public function index(Request $request, Response $response){

        $this->logger->alert("Testanu");
        return $this->view->render($response, 'home.phtml');
    }

}