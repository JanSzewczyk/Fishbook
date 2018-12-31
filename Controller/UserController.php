<?php

require_once("AppController.php");
require_once(__DIR__.'/../model/UserMapper.php');


class UserController extends AppController
{
    private $mapper = null;
    public function __construct()
    {
        parent::__construct();
        $this->mapper = new UserMapper();
    }

    public function usermenu():void
    {
        //$mapper = new UserMapper();

        $exp = $this->mapper->get3Expedition($_SESSION["id"]);

        $_SESSION['listExped'] = $exp;

        if(!isset($_SESSION['zalogowany'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }
        $this->render("usermenu");
    }

    public function expedition():void
    {
        $id=$_GET['id_expedition'];

        $trophy = $this->mapper->getTrophy($id);
        $_SESSION['listTrophy'] = $trophy;

        print_r($trophy);
        if(!isset($_SESSION['zalogowany'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }
        $this->render("expedition");
    }

}