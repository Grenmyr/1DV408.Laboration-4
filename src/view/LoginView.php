<?php
class LoginView {
    public function showLogin (){
        $ret ="<h1>Laborationskod dg222cs</h1>
        <h2>

    Ej Inloggad

</h2>
<form enctype=multipart/form-data method=post action=?login>

    <fieldset>
        <legend>
            Login - Skriv in användarnamn och lösenord
        </legend>
        <label for='Användarnamn'>
        Användarnamn:
        </label>
        <input type='text' size='25'>
        <label for='Lösenord'> Lösenord </label>
        <input type='Lösenord' size='25'>
        <input type='submit' value='Logga in'>
    </fieldset>

</form>
        ";
        return $ret;
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-06
 * Time: 13:05
 */ 