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
        $currDate = date("d");
        $clock = date("Y [G:i:s]");

        // This dates return interger so i can replace them with my values in arrays below.
        $monthInt = (int)date("m");
        $WeekDayInt = (int)date("N");

        $days = array('Måndag', 'Tisdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lördag', 'Söndag');
        $month = array ('Januari','Februari','Mars','April','Maj','Juni','Juli','Sommarlov','September','Oktober','November','Jullov');

        $sweDay = $days[$WeekDayInt-1];
        $sweMonth = $month[$monthInt-1];

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
<div>
    <p>$sweDay $currDate $sweMonth $clock</p>
</div>
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