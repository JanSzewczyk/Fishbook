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

    public function getUser(
        string $email
    ):User {
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

    public function getAll(
    ):array {
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