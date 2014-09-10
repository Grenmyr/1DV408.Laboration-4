<?php
class SessionModel {

   public function __construct(){
       session_start();

   }
    public  function CheckValidSession(){
       return $_SESSION["validSession"];
    }
    public function SetValidSession(){
        $_SESSION["validSession"]=true;
        var_dump($_SESSION["validSession"]);

    }
   public function SaveMessage($string){
       $_SESSION["message"]= $string;
   }
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