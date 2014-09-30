<?php
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-30
 * Time: 14:26
 */

class UniqueRepository extends Repository {
    private static $userID="userID";
    private static $expire="expire";
    private static $uniqueKey = "uniquekey";
    private static $dbTable ='uniquekey';

    public function add($unique, $expireTime, UserModel $user) {
        try {
        $db = $this -> connection();
        $sql = "INSERT INTO  " . self::$dbTable . "  (" . self::$userID . ", " . self::$expire . ",". self::$uniqueKey .") VALUES (?, ?,?)";
        $params = array($user -> GetUserID(), $expireTime, $unique);
        $query = $db -> prepare($sql);
        $query -> execute($params);
        } catch (\PDOException $e) {
        die('An unknown error have occured.');
        }
    }
    public function GetUniqueKey($uniqueKey) {
        try {
        $db = $this -> connection();
        $sql = "SELECT * FROM " . self::$dbTable . " WHERE " . self::$uniqueKey . " = ?";
        $params = array($uniqueKey);
        $query = $db -> prepare($sql);
        $query -> execute($params);
        $result = $query -> fetch();
        if($result){
            $userModel = new UserModel();
            // Set my UserID and Expire to my dbUserModel.
            $userModel->SetUserID($result[self::$userID]);
            $userModel->SetExpire($result[self::$expire]);
            return $userModel;
        }
        else{
            return NULL;
        }
        } catch (\PDOException $e) {
           die('An unknown error have occured.');
        }
    }
} 