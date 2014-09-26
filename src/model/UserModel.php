<?php
require_once("./src/model/SessionModel.php");

class UserModel{
    private $username = "Admin";
    private $password = "Password";
    // If multiple users this unique is random and stored in databasse.
    private $unique = "userCredentialsForCookieString";

    private $sessionModel;

    public function __construct() {
        $this->sessionModel = new SessionModel();
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
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-09
 * Time: 13:50
 */ 