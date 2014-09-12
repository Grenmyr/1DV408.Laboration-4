<?php
class AuthenticatedView {
    private $logOut = "logout";
    // Return true if submit.
    public function userLoggedOut(){
        return isset($_GET[$this->logOut]);

    }


    public function showAuthenticatedView (){
        $ret ="<h1>Laborationskod dg222cs</h1>
        <h2>
            Admin är inloggad.
        </h2>
        <P>Inloggning lyckades</P>
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