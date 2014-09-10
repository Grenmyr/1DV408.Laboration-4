<?php
class LoginView {

    public function GetUsername(){
        return($_POST["username"]);
    }

    Public function GetPassword(){
        return($_POST["password"]);
    }
    // Return true if submit.
    public function userSubmit(){
        return isset($_POST['submitButton']);

    }

    public function showLogin (){
        $ret ="<h1>Laborationskod dg222cs</h1>
        <h2>

    Ej Inloggad

</h2>
<form enctype=multipart/form-data method=post>

    <fieldset>
        <legend>
            Login - Skriv in användarnamn och lösenord
        </legend>
        <label for='Användarnamn'>
        Användarnamn:
        </label>
        <input type='text' size='25' name='username'>
        <label for='Lösenord'> Lösenord </label>
        <input type='password' size='25' name='password'>
        <input type='submit' value='Logga in' name='submitButton'>
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