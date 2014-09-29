<?php
require_once("Repository.php");

class UserRepository extends Repository {
    private static $userName="username";
    private static $password="password";
    private static $uniqueKey = "uniquekey";
    //TODO Här e jag ska initioera add;
    public function add(UserModel $user) {
        if($getUser = $this->GetByUsername($user->GetUser())){
            throw new Exception();
        }

        //try {
            $db = $this -> connection();
            $sql = "INSERT INTO $this->dbTable (" . self::$userName . ", " . self::$password . ",". self::$uniqueKey .") VALUES (?, ?,?)";
            $params = array($user -> GetUser(), $user -> GetPassword(), $user->GetUnique());
            $query = $db -> prepare($sql);
            $query -> execute($params);



        //} catch (\PDOException $e) {
            //die('An unknown error have occured.');
        //}
    }
    public function GetByUsername($username) {
        //try {
            $db = $this -> connection();
            $sql = "SELECT * FROM $this->dbTable WHERE " . self::$userName . " = ?";
            $params = array($username);
            $query = $db -> prepare($sql);
            $query -> execute($params);
            $result = $query -> fetch();
        if($result){
            $userModel = new UserModel();
            $userModel->registerUser($result['username']);
            $userModel->registerPassword($result['password']);
            return $userModel;
        }
        else{
            return NULL;
        }


        //} catch (\PDOException $e) {
         //   die('An unknown error have occured.');
        //}
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-26
 * Time: 16:05
 */