<?php
require_once("LoginController.php");
require_once("RegisterController.php");



class MasterController {
    private $loginController;
    private $RegisterController;

    // Construct initializing my 2 other controllers.
    public function __construct(){
        $this->loginController = new LoginController();
        $this->RegisterController = new RegisterController();
    }
    // Return dom to index.php
    public function render(){
        return $this->loginController->render();
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-25
 * Time: 16:59
 */