<?php
class CookieView {
    private $cookieName = "uniqueString";
    private $cookieTime;

    public function save($unique) {
        $this->cookieTime = time()+120;
        //If mutiple users store this data in database.
        file_put_contents("cookietime.txt",$this->cookieTime);
        setcookie( $this->cookieName, $unique, $this->cookieTime);
    }
    public function cookieExist() {
        if(isset($_COOKIE[$this->cookieName])){
            return true;
        }
        return false;
    }
    public function load(){
        $ret = $_COOKIE[$this->cookieName];
        return $ret;
    }
    public function delete(){
        setcookie( $this->cookieName, NULL, time()-1);
    }
    public  function GetExpire(){
        return file_get_contents("cookietime.txt");
    }
}
/**
 * Created by PhpStorm..
 * User: dav
 * Date: 2014-09-13
 * Time: 16:08
 */
