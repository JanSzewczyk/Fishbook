<?php

require_once("AppController.php");
require_once(__DIR__.'/../model/UserMapper.php');


class DeleteController extends AppController
{
    private $mapper = null;

    public function __construct()
    {
        parent::__construct();
        $this->mapper = new UserMapper();
    }

    public function deletetrophy():void
    {
        if(!isset($_SESSION['zalogowany'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }

        $id_exped = $_GET['id_expedition'];
        $id_trophy = $_GET['id_trophy'];

        $this->mapper->deleteTrophy($id_trophy);

        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}Fishbook/?page=expedition&id_expedition=".$id_exped);
        exit();
    }


    public function deletexpedition():void
    {
        if(!isset($_SESSION['zalogowany'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }

        $id_exped = $_GET['id_expedition'];
        $this->mapper->deleteExpedition($id_exped);
        //zrobić usuwanie wyprwa


        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}Fishbook/?page=usermenu");
        exit();
    }
}