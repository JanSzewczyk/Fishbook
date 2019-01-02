<?php

require_once('Controller/DefaultController.php');
require_once('Controller/SignupController.php');
require_once('Controller/UserController.php');
require_once('Controller/AddController.php');
require_once('Controller/DeleteController.php');

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
            ],
            'signup' => [
                'controller' => 'SignupController',
                'action' => 'signup'
            ],
            'usermenu' => [
                'controller' => 'UserController',
                'action' => 'usermenu'
            ],
            'expedition' => [
                'controller' => 'UserController',
                'action' => 'expedition'
            ],
            'addexpedition' => [
                'controller' => 'AddController',
                'action' => 'addexpedition'
            ],
            'deletetrophy' => [
                'controller' => 'DeleteController',
                'action' => 'deletetrophy'
            ],
            'deletexpedition' => [
                'controller' => 'DeleteController',
                'action' => 'deletexpedition'
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

