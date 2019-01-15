<?php

require_once("AppController.php");
require_once(__DIR__.'/../model/UserMapper.php');

class SignupController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function signup()
    {
        $mapper = new UserMapper();

        //ZABEZPIECZENIE
        if(isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany'] == true) ){
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}Fishbook/?page=usermenu");
            exit();
        }

        if($this->isPost()){
            $wszystko_ok = true;
            //$_SESSION['e_name'] = "elo działa";

            //sprawdzanie IMIENIA
            $name = $_POST['name'];
            if((strlen($name)<3) || (strlen($name)>20)){
                $wszystko_ok = false;
                $_SESSION['e_name'] = "Imie musi posiadać od 3 do 20 liter!";
            }

            if(ctype_alpha($name) == false){
                $wszystko_ok = false;
                $_SESSION['e_name'] = "Imie może składać się tylko z liter!";
            }

            //sprawdzanie NAZWISKA
            $surname = $_POST['surname'];
            if((strlen($surname)<3) || (strlen($surname)>30)){
                $wszystko_ok = false;
                $_SESSION['e_surname'] = "Nazwisko musi posiadać od 3 do 30 liter!";
            }

            if(ctype_alpha($name) == false){
                $wszystko_ok = false;
                $_SESSION['e_surname'] = "Nazwisko może składać się tylko z liter!";
            }

            //sprawdzanie MAILA
            $email = $_POST['email'];
            $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
            if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false || ($emailB != $email))){
                $wszystko_ok = false;
                $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
            }

            //sprawdzanie HASEŁ
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            if((strlen($password1)<3) || (strlen($password1)>20)){
                $wszystko_ok = false;
                $_SESSION['e_password'] = "Hasło musi posiadać od 3 do 20 znaków!";
            }

            if($password1 != $password2){
                $wszystko_ok = false;
                $_SESSION['e_password'] = "Podane hasła nie są identyczne!";
            }

            //Hashowanie HASŁA
            $pass_hash = password_hash($password1, PASSWORD_DEFAULT);

            //check box
            if(!isset($_POST['reg'])){
                $wszystko_ok = false;
                $_SESSION['e_reg'] = "Potwierdź akceptacje regulaminu!";
            }

            //Sprawdzanie w bazie
            if($mapper->getUser($_POST['email'])->getEmail() == $_POST['email']){
                $wszystko_ok = false;
                $_SESSION['e_email'] = "Istnieje już konto przypisane do tego adresu email!";
            }

            if($wszystko_ok == true){
                $mapper->addUser($_POST['name'], $_POST['surname'], $_POST['email'], md5($_POST['password1']));

                    $url = "http://$_SERVER[HTTP_HOST]/";
                    header("Location: {$url}Fishbook/?page=index");
                    exit();
            }
        }

        $this->render('signup');
    }
}