<?php

require_once("AppController.php");
require_once(__DIR__.'/../model/AdminMapper.php');


class AdminController extends AppController
{
    private $adminmapper = null;

    public function __construct()
    {
        parent::__construct();
        $this->adminmapper = new AdminMapper();
    }

    public function adminmenu():void
    {
        if(!isset($_SESSION['zalogowany'])) {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }

        if($_SESSION['role'] == "user"){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }

        $users = $this->adminmapper->getAllUsers($_SESSION['id']);
        $_SESSION['users'] = $users;

        $this->render("adminmenu");
    }

    public function deleteuser():void
    {
        if(!isset($_SESSION['zalogowany'])) {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }

        if($_SESSION['role'] == "user"){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }

        if(!isset($_SESSION['zalogowany'])) {
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=index");
            exit();
        }

        $id = $_GET['id_user'];

        $this->adminmapper->deleteUser($id);

        $url = "http://$_SERVER[HTTP_HOST]/";
        header("Location: {$url}Fishbook/?page=adminmenu");
        exit();
    }

}