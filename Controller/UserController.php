<?php

require_once("AppController.php");

class UserController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function usermenu():void
    {
        if(!isset($_SESSION['zalogowany'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }
        $this->render("usermenu");
    }

}