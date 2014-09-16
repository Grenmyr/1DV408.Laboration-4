<?php
class SessionModel {

   // Set a new session.
   public function __construct(){
       session_start();
   }
    /**
     * @return true or false.
     */
    public  function CheckValidSession($agent){
        // Satt här sist!
        if(isset($_SESSION["validSession"])&& isset($_SESSION['agent'])){
            var_dump($_SESSION['agent']);
            var_dump("variabel" .$agent);
            if($_SESSION['agent']=== $agent )
            return true;
        }
        return false;
    }


    // used to set session.
    public function SetValidSession($agent){
        $_SESSION["validSession"]=true;
        $_SESSION["agent"] = $agent;
        //var_dump($_SESSION["validSession"]);
    }
    // not used right now, to be implemented in logout and timed.
    public function UnsetSession(){
        unset($_SESSION['validSession']);
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