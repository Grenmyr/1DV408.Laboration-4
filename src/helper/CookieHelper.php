<?php
class CookieHelper {
    private static $cookieName = "CookieStorage";
    public function save($string) {
        setcookie( self::$cookieName, $string, -1);
        var_dump($_COOKIE);
        var_dump($_SESSION);
    }
    public function load() {
//$ret = isset($_COOKIE["CookieStorage"]) ? $_COOKIE["CookieStorage"] : "";
        if (isset($_COOKIE[self::$cookieName]))
            $ret = $_COOKIE[self::$cookieName];
        else
            $ret = "";
        setcookie(self::$cookieName, "", time() -1);
        return $ret;
    }
}
/**
 * Created by PhpStorm..
 * User: dav
 * Date: 2014-09-13
 * Time: 16:08
 */
