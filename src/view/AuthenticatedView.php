<?php
class AuthenticatedView {
    private $logOut = "logout";
    private $message = "";
    // Return true if submit.
    public function userLoggedOut(){
        return isset($_GET[$this->logOut]);
    }
    public  function successMSG(){
        $this->message = "Inloggning lyckades.";
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