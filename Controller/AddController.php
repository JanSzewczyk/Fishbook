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

            //$mapper = new UserMapper();
            $this->mapper->addExpedition($_SESSION['id'],$date, $pleace, $comment);
            //TODO mini window with with the message about adding to the database
        }

        $this->render("addexpedition");
    }

    public function addtrophy():void
    {

    }
}