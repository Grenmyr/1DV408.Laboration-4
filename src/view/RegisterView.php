<?php

class RegisterView {
    /**
     * @var URLView
     */
    private $urlView;
    public function __construct($URLView){
        $this->urlView = $URLView;
    }

    public function GetUsername(){
        if(isset($_POST["username"])){
            return($_POST["username"]);
        }
        return false;
    }
    Public function GetPassword1(){
        if(isset($_POST["password1"])){
            return($_POST["password1"]);
        }
        return false;
    }
    Public function GetPassword2(){
        if(isset($_POST["password2"])){
            return($_POST["password2"]);

        }
        return false;
    }


    public function show(){
        $username = $this->GetUsername();
        $password1 = $this->GetPassword1();
        $password2 = $this->GetPassword2();
        $ret ="<h1>Laborationskod dg222cs</h1>
        <h2>
    Ej Inloggad, Registrerar användare
</h2>
<form enctype=multipart/form-data method=post action='" . URLView::$registerPath . "'>
    <a href='" . URLView::$logginPath . "'>Registrera ny användare</a>
    <fieldset>
        <legend>
            Registrera ny användare -Skriv in användarnamn och lösenord
        </legend>
        <label>
        Namn:
        </label>
        <input type='text' size='25' name='username' value='$username'>
        <label> Lösenord </label>
        <input type='password' size='25' name='password1' value='$password1'>
        <label> Repetera Lösenord</label>
        <input type='password' size='25' name='password2' value='$password2'>
        <input type='submit' value='Logga in' name='registerButton'>
    </fieldset>
</form>

        ";
        return $ret;
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-25
 * Time: 16:56
 */