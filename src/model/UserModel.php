<?php
require_once("./src/model/SessionModel.php");
require_once("./src/Exception/RegisterException.php");
require_once("./src/Exception/RegexException.php");

class UserModel{
    //fuckar upp vanlig just nu
    private $username;
    private $password;

    // If multiple users this unique is random and stored in databasse.
    private $unique = "userCredentialsForCookieString";

    private $sessionModel;

    public function __construct() {
        if(session_status() !== PHP_SESSION_ACTIVE){
        $this->sessionModel = new SessionModel();
        }
        $this->unique = uniqid();
    }



    /**
     * @param $cookieString
     * @param $cookieTime
     * @param $agent
     * @return bool
     * This function handles cookie log in, and checks for unique string, representing correct username and password saved earlier.
     * Also check time has not been manipulated in cookie, and agent is if successful login saved into session.
     */
    public function cookieLogin($cookieString,$cookieTime,$agent){
        if($this->unique === $cookieString&& $cookieTime > time()){
            $this->sessionModel->SetValidSession($agent);
            return true;
        }
            return false;
    }
    // Return a string that represent correct password and username.
    public function GetUnique(){
        return $this->unique;
    }
    public function GetUser(){
        return $this->username;
    }
    public function GetPassword(){
        return $this->password;
    }

    public function logIn( $username, $password,$agent){
        //var_dump($this->username == $username && $this->password == $password);
        if ($this->username == $username && $this->password == $password) {
            $this->sessionModel->SetValidSession($agent);
            return true;
        }
        return false;
    }
    public function LogOut(){

        $this->sessionModel->UnsetSession();
    }

    public function IsAuthenticated($agent){
        return $this->sessionModel->CheckValidSession($agent);
    }

    /*CODE BELOW THIS BELONG TO REGISTERCONTROLLER AND HANDLES REGISTRATION*/
    const userNameMinLength = 3;
    const PasswordMinLength = 6;

    public function isValid(){
        return ($this->password !== null && $this->username !== null);
    }

    public function sanitizeName($userName){
        //http://stackoverflow.com/questions/3022185/regular-expression-sanitize-php
       if(!preg_match('/[^a-z0-9\-]+/i', "$userName" )){
           return true;
       }
       else{
           $userName = preg_replace('/[^a-z0-9]+/i', '', $userName);
           //return (trim($userName, '-'));
           throw new \src\Exception\RegexException($userName);
       }
    }

    public function checkValidName($userName){
        return(preg_match('/[^a-z0-9\-]+/i', "$userName" ));
    }

    public function registerUser($userName){
        $this->sanitizeName($userName);

        if(strlen($userName) < self::userNameMinLength){
        throw new \src\Exception\RegisterException("Användarnamnet har för få tecken. Minst 3 tecken");
        }
        else{
            $this->username = $userName;
        }
    }
    public function registerPassword($password){
        // TODO I NEED TO VALIDATE USER AND PASSWORD AND think what to store in database.
        if((strlen($password) < self::PasswordMinLength) ) {
            throw new \src\Exception\RegisterException("Lösenorden har för få tecken.Minst 6 tecken");
        }

        $this->password = password_hash($password,PASSWORD_BCRYPT);
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-09
 * Time: 13:50
 */ 