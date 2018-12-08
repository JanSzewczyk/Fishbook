<?php

require_once('Controller/DefaultController.php');
//require_once('controllers/UploadController.php');
//require_once('controllers/PlayerController.php');

class Routing
{
    public $routes = [];

    public function __construct()
    {
        $this->routes = [
            'index' => [
                'controller' => 'DefaultController',
                'action' => 'index'
            ],
            'login' => [
                'controller' => 'DefaultController',
                'action' => 'login'
            ],
            'funny' => [
                'controller' => 'DefaultController',
                'action' => 'funny'
            ],
            'aboutme' => [
                'controller' => 'DefaultController',
                'action' => 'aboutme'
            ],
            'logout' => [
                'controller' => 'DefaultController',
                'action' => 'logout'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page'])
        && isset($this->routes[$_GET['page']]) ? $_GET['page'] : 'index';

        if ($this->routes[$page]) {
            $class = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $class;
            $object->$action();
        }
    }

}

