<?php
class LoggedInView {
    private $message = "";

    /**
     * @var URLView
     */
    private $urlView;
    private $user;

    public function __construct($URLView){
        $this->urlView = $URLView;
    }
    public function userLoggedOut(){
         return isset($_GET[URLView::$logoutPath]);
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
    public function presentUser($userName){
        $this->user = $userName;
    }

    public function show (){
        return '
            <h1>Laborationskod dg222cs</h1>
            <h2>
                '.$this->user.' är inloggad.
            </h2>
            <P>'. $this->message .'</P>
            <a href="?' . URLView::$logoutPath . '">Logga ut</a>
        ';
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-10
 * Time: 16:02
 */ 