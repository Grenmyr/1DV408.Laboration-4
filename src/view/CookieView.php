<?php
class CookieView {
    private $cookieName = "uniqueString";

    public function save($unique) {
        setcookie( $this->cookieName, $unique, strtotime('+15 years'));
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
}
/**
 * Created by PhpStorm..
 * User: dav
 * Date: 2014-09-13
 * Time: 16:08
 */