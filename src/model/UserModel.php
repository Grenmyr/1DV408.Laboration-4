<?php
require_once("./src/model/SessionModel.php");

class UserModel{
    private $username = "Admin";
    private $password = "Password";
    private $unique = "userCredentialsForCookieString";

    private $sessionModel;

    public function __construct() {
        // Todo: Här i eller annan model klass ska jag kontrollera att input username och password från klient är
        // Giltig data innan jag gör strängjämförelsen med min databas uppgift.
        $this->sessionModel = new SessionModel();
    }

    /**
     * @param $username
     * @param $password
     * Sets my authenticated variable to true if correct username and password from LoginView.
     */
    public function checkUnique($cookieString){
        if($this->unique === $cookieString){
            // Start new session if valid cookie.
            $this->sessionModel->SetValidSession();
            return true;
        }
            return false;
    }
    public function GetUnique(){
        return $this->unique;
    }

    public function logIn( $username, $password){
        //var_dump($this->username == $username && $this->password == $password);
        if ($this->username == $username && $this->password == $password) {

            $this->sessionModel->SetValidSession();
            return true;
        }
        return false;
    }
    public function LogOut(){
        $this->sessionModel->UnsetSession();
    }

    public function IsAuthenticated(){
        return $this->sessionModel->CheckValidSession();
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-09
 * Time: 13:50
 */ 