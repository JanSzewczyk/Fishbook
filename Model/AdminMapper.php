<?php

require_once __DIR__.'/../Database.php';
require_once(__DIR__.'/UserMapper.php');

class AdminMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getAllUsers($id):array {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM Fb_user where id not like :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetchAll();
            return $user;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function deleteUser($id_user):void {

        $userMapper = new UserMapper();

        $expeditions = $userMapper->getAllExpedition($id_user);
        foreach ($expeditions as $exp){
            $id_exp = $exp['id'];
           $userMapper->deleteExpedition($id_exp);
        }

        try {
            $stmt = $this->database->connect()->prepare('DELETE FROM Fb_user WHERE id = :id_user;');
            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
            $stmt->execute();

        }
        catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}