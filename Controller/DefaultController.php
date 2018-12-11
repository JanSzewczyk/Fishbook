<?php

require_once("AppController.php");
require_once(__DIR__.'/../model/UserMapper.php');
require_once(__DIR__.'/../Model/User.php');


class DefaultController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render('index');
    }

    public function funny()
    {
        $this->render('funny');
    }

    public function aboutme()
    {
        $this->render('aboutme');
    }

    public function login()
    {
        $mapper = new UserMapper();
        $user = null;

        if ($this->isPost()) {
            $user = $mapper->getUser($_POST['email']);

            //var_dump($user);                        //nie dzia la wyświetlanie e maaila
            if(!$user) {
                return $this->render('login', ['message' => ['Email not recognized']]);
            }

            if ($user->getPassword() !== md5($_POST['password'])) {
                return $this->render('login', ['message' => ['Wrong password']]);
            } else {
                $_SESSION["id"] = $user->getEmail();
                $_SESSION["role"] = $user->getRole();

                echo "Zalogowałeś się";
                exit();
            }
        }

        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('index');
    }
}