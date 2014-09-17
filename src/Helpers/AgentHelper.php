<?php
class AgentHelper {
    private $userData =  "";

    public function GetAgent(){
        $this->userData = $_SERVER['HTTP_USER_AGENT'];
        return $this->userData;
    }
    public function saveAgent(){

    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-16
 * Time: 12:43
 */ 