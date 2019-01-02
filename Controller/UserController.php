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
        if(!isset($_SESSION['zalogowany'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }

        $exp = $this->mapper->get3Expedition($_SESSION["id"]);

        $_SESSION['listExped'] = $exp;


        $this->render("usermenu");
    }

    public function expedition():void
    {
        if(!isset($_SESSION['zalogowany'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }

        $id=$_GET['id_expedition'];

        $trophy = $this->mapper->getTrophy($id);
        $_SESSION['listTrophy'] = $trophy;

        $expedition = $this->mapper->getExpedition($id);
        $_SESSION['expedition'] = $expedition;


        $this->render("expedition");
    }

}