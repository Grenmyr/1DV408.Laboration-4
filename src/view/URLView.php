<?php
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-25
 * Time: 17:44
 */

class URLView {
    public  static $logginPath = '?path=login';
    public  static $registerPath = '?path=register';
    public static $logoutPath = 'logout';

    public function isLoggedIn(){
        return $this->GetPath() === self::$logginPath;
    }
    public function isRegister(){
        return $this->GetPath() === self::$registerPath;
    }
    public function GetPath(){
        // Get what path i am on.
        if(isset($_GET['path'])){
            return $_GET['path'];
        }
        return 'login';
    }
} 