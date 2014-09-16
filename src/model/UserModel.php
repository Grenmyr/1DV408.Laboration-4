<?php
require_once("./src/model/SessionModel.php");

class UserModel{
    private $username = "Admin";
    private $password = "Password";
    private $unique = "userCredentialsForCookieString";
    private $agent;

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
    public function checkUnique($cookieString,$cookieTime,$agent){
        // Time() here could be manipulated by change client time, But that could also be dome if i decided to write
        //Time into text dokument. Only server can give secure time, and since no server i just check Time() in $thislaboration.
        var_dump($cookieTime,time());
        if($this->unique === $cookieString&& $cookieTime > time()){
            // Start new session if valid cookie.

            $this->sessionModel->SetValidSession($agent);
            return true;
        }
            return false;
    }
    public function GetUnique(){
        //TODO Read from textfile expire date and compare.
        return $this->unique;
    }
    public  function SetAgent($agent){
        $this->agent = $agent;
    }


    public function logIn( $username, $password,$agent){
        //var_dump($this->username == $username && $this->password == $password);
        if ($this->username == $username && $this->password == $password) {
            $this->SetAgent($agent);
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