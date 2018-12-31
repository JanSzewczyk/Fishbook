<?php

require_once 'User.php';
require_once __DIR__.'/../Database.php';

class UserMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getUser(string $email):User {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM Fb_user WHERE email = :email;');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return new User($user['id'],$user['name'], $user['surname'], $user['email'], $user['password'], $user['role']);
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function getFish():array {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM Fb_fish;');
            $stmt->execute();

            $fish = $stmt->fetchAll();
            return $fish;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function get3Expedition(string $userID):array {
        try {
            $stmt = $this->database->connect()->prepare('select * from Fb_expedition where id_user = :userID order by date desc limit 3;');
            $stmt->bindParam(':userID', $userID, PDO::PARAM_STR);
            $stmt->execute();

            $exp = $stmt->fetchAll();
            return $exp;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function getTrophy(string $expedID):array {
        try {
            $stmt = $this->database->connect()->prepare('select Fb_trophy.weight, Fb_trophy.length, Fb_fish.name from Fb_trophy, Fb_fish where Fb_fish.id = Fb_trophy.id_fish and Fb_trophy.id_expedition = :expedID ;');
            $stmt->bindParam(':expedID', $expedID, PDO::PARAM_STR);
            $stmt->execute();

            $trophy = $stmt->fetchAll();
            return $trophy;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function addUser($name, $surname, $email, $password):void {
        try {
            $stmt = $this->database->connect()->prepare('INSERT INTO Fb_user VALUES (null, :name, :surname, :email, :password, "user" )');

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            $stmt->execute();
        }
        catch(PDOException $e) {
           echo 'Error: ' . $e->getMessage();
        }
    }

    public function addExpedition($id, $date, $pleace, $comment = ''):void {
        try {
            $stmt = $this->database->connect()->prepare('INSERT INTO Fb_expedition VALUES (null, :id, :date, :pleace, :comment )');

            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->bindParam(':pleace', $pleace, PDO::PARAM_STR);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

            $stmt->execute();
        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getAll():array {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM Fb_user ');
            $stmt->execute();
            $user = $stmt->fetchAll();
            return $user;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}