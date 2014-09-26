<?php
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-25
 * Time: 17:44
 */

class URLView {
    public function isLoggedIn(){
        return $this->getPath() === 'loggedin';
    }
    public function isRegister(){
        return $this->getPath() === 'register';
    }
    public function getPath(){
        // Get what path i am on.

        if(isset($_GET['path'])){
            return $_GET['path'];
        }
        return 'register';
    }

    public function getLoggedInUrl() {
        return '?path=loggedin';
    }
} 