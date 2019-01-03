<?php

require_once("AppController.php");
require_once(__DIR__.'/../model/UserMapper.php');


class AddController extends AppController
{
    private $mapper = null;

    public function __construct()
    {
        parent::__construct();
        $this->mapper = new UserMapper();
    }

    public function addexpedition():void
    {
        if(!isset($_SESSION['zalogowany'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }

        if($this->isPost()){
            $date = $_POST['date'];
            $pleace= $_POST['pleace'];
            $comment = $_POST['comment'];

            $this->mapper->addExpedition($_SESSION['id'],$date, $pleace, $comment);
            //TODO mini window with with the message about adding to the database
        }

        $this->render("addexpedition");
    }

    public function addtrophy():void
    {
        if(!isset($_SESSION['zalogowany'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }

        if(!isset($_SESSION['expedition'])){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }

        $fishList = $this->mapper->getFish();
        $_SESSION['fishList'] = $fishList;

        $id_expedition =$_SESSION['expedition']['id'];

        if($this->isPost()){
            $everyOK = true;
            $id_fish = $_POST['fish'];
            $length = $_POST['length'];
            $weight = $_POST['weight'];

            if((int)$length <= 0) {
                $everyOK = false;
                $_SESSION['e_length'] = "Provide a positive length!";
            }

            if((int)$weight <= 0) {
                $everyOK = false;
                $_SESSION['e_weight'] = "Provide a positive weight!";
            }

            if($everyOK == true){
                $this->mapper->addTrophy($id_expedition, $id_fish, $length, $weight);

                $url = "http://$_SERVER[HTTP_HOST]/";
                header("Location: {$url}Fishbook/?page=expedition&id_expedition={$id_expedition}");
                exit();
            }
            //TODO mini window with with the message about adding to the database
        }

        $this->render("addtrophy");
    }
}