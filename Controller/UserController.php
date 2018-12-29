<?php

require_once("AppController.php");
require_once(__DIR__.'/../model/UserMapper.php');


class UserController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function usermenu():void
    {
        $mapper = new UserMapper();

        $users = $mapper->getAll();
        $_SESSION['listUsers'] = $users;            // udostępnienie listy użytkowników

        //print_r($users);

        if(!isset($_SESSION['zalogowany'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }
        $this->render("usermenu");
    }

}