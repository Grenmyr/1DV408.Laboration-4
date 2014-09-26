<?php
class LoginView {
    private $message;
    /**
     * @var URLView
     */
    private $urlView;


    public  function __construct($urlView){
        $this->urlView = $urlView;
    }
    public function GetUsername(){
        return (isset($_POST["username"])) ? $_POST["username"] : '';
    }

    Public function GetPassword(){
        return (isset($_POST["password"])) ? $_POST["password"] : '';
    }

    Public function wantCookie() {
        if(isset($_POST["LoginView::Checked"])){
            return true;
        }
        return false;
    }

    public  function successMSG(){
        $this->message = "Du har nu loggat ut.";
    }


    public function FailedMSG($username,$password) {
        if($username===""){
        $this->message = 'Användarnamn saknas: ';
        }
        else if($password === ""){
            $this->message .= "Lösenord saknas";
        }
        else{
            $this->message .= "Felaktigt användarnamn och/eller lösenord.";
        }
    }
    public function failedCookieMSG(){
        $this->message = "Felaktig information i cookie.";
    }


    // Return true if submit.
    public function userSubmit(){
        if  (isset($_POST['submitButton'])){

            return true;
        }
        return false;
    }

    public function show (){
        $username = $this->GetUsername();
        $password = $this->GetPassword();
        return "
            <h1>Laborationskod dg222cs</h1>
            <h2>Ej Inloggad</h2>
            <form enctype=multipart/form-data method=post action='" . URLView::$logginPath . "'>
                   <a href='" . URLView::$registerPath . "'>Registrera ny användare</a>
                <fieldset>
                    <legend>
                        Login - Skriv in användarnamn och lösenord
                    </legend>
                    <p>$this->message<p>
                    <label>
                    Användarnamn:
                    </label>
                    <input type='text' size='25' name='username' value='$username'>
                    <label> Lösenord </label>
                    <input type='password' size='25' name='password' value='$password'>
                    <label>Håll mig inloggad</label>
                    <input type='checkbox' name='LoginView::Checked' id='AutologinID'/>
                    <input type='submit' value='Logga in' name='submitButton'>
                </fieldset>
            </form>
        ";
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-06
 * Time: 13:05
 */ 