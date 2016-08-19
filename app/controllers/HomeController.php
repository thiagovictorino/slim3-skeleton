<?php namespace App\Controller;

/**
 * Created by PhpStorm.
 * User: thiagovictorino
 * Date: 8/18/16
 * Time: 22:36
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class HomeController extends BaseController
{

    public function index(Request $request, Response $response){

        $response->getBody()->write("Hello");
        return $response;
    }

}