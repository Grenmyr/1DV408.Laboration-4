<?php
class AuthenticatedView {

    // Return true if submit.
    public function userLoggedOut(){
    if ($_GET['a'] === "logout"){
        return true;
    }
        else{
            return false;
        }
    }


    public function showAuthenticatedView (){
        $ret ="<h1>Laborationskod dg222cs</h1>
        <h2>
            Admin är inloggad.
        </h2>
        <P>Inloggning lyckades</P>
        <a href='?a=logout'>Logga ut</a>
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