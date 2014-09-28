<?php
require_once("Repository.php");

class UserRepository extends Repository {
    private static $userName="userName";
    private static $password="password";
    //TODO Här e jag ska initioera add;
    public function add(UserModel $user) {
        try {
            $db = $this -> connection();
            $sql = "INSERT INTO $this->dbTable (" . self::$userName . ", " . self::$password . ") VALUES (?, ?)";
            $params = array($user -> getUnique(), $user -> getName());
            $query = $db -> prepare($sql);
            $query -> execute($params);

        } catch (\PDOException $e) {
            die('An unknown error have occured.');
        }
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-26
 * Time: 16:05
 */