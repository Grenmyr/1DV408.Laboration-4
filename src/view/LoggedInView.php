<?php
class LoggedInView {
    private $logOut = "logout";
    private $message = "";
    private $urlView;

    public function __construct($URLView){
        $this->urlView = $URLView;
    }
    public function userLoggedOut(){
        return isset($_GET[$this->logOut]);
    }
    public  function successMSG(){
        $this->message = "Inloggning lyckades.";
    }
    public function cookieSuccessMSG() {
        $this->message = "Inloggningen lyckades och vi kommer ihåg dig nästa gång.";
    }
    public function cookieLoginMSG(){
        $this->message = "Inloggning lyckades via cookies.";
    }

    public function show (){
        $ret ="<h1>Laborationskod dg222cs</h1>
        <h2>
            Admin är inloggad.
        </h2>
        <P>$this->message</P>
        <a href='?$this->logOut'>Logga ut</a>
        ";
        return $ret;
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-10
 * Time: 16:02
 */ 