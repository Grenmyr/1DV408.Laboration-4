<?php
class LoginView {

    public function GetUserName(){
        // Ej implementerad ska retunera Textfält UserName
        return($_POST["userName"]);
    }

    Public function GetPassword(){
        // Ej implementerad ska retunera Textfält password
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
<form enctype=multipart/form-data method=post action=?login>

    <fieldset>
        <legend>
            Login - Skriv in användarnamn och lösenord
        </legend>
        <label for='Användarnamn'>
        Användarnamn:
        </label>
        <input type='text' size='25' name='userName'>
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