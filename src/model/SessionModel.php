<?php
class SessionModel {

   // Set a new session.
   public function __construct(){
       session_start();
   }
    /**
     * @return true or false.
     */
    public  function CheckValidSession(){
        if(isset($_SESSION["validSession"])){
            return $_SESSION["validSession"];
        }
        return false;
    }

    // used to set session.
    public function SetValidSession(){
        $_SESSION["validSession"]=true;
        //var_dump($_SESSION["validSession"]);
    }
    // not used right now, to be implemented in logout and timed.
    public function UnsetSession(){
        //$_SESSION["validSession"]=false;
        unset($_SESSION['validSession']);
        //header("Location: {$_SERVER['PHP_SELF']}");

    }
   // Not implemented in application
   public function SaveMessage($string){
       $_SESSION["message"]= $string;
   }
    // Not implemented in application
    public function GetMessage(){
        $ret = $_SESSION["message"];
        return $ret;
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-10
 * Time: 18:01
*/