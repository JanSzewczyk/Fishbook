<?php

require_once("AppController.php");
require_once(__DIR__.'/../model/UserMapper.php');


class AddController extends AppController
{
    public function __construct()
    {
        parent::__construct();
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

            $mapper = new UserMapper();
            $mapper->addExpedition($_SESSION['id'],$date, $pleace, $comment);
            //TODO mini window with with the message about adding to the database
        }

        $this->render("addexpedition");
    }

}