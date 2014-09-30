<?php
require_once("LoginController.php");
require_once("RegisterController.php");
require_once("./src/view/URLView.php");



class MasterController {
    //private $loginController;
    //private $RegisterController;
    private $urlView;

    public function __construct(){
        $this->urlView = new URLView();
    }
    // Return dom to index.php
    public function render(){
        if($this->urlView->GetPath()=== 'register'){
            $c = new RegisterController($this->urlView);
            $page = $c->render();
            if($page === null){
                $c = new LoginController($this->urlView);
                $c->registrationMSG();
                return $c->render();
            }
            return $page;
            //return $this->RegisterController->render();
        }
        //return $this->loginController->render();
        $c = new LoginController($this->urlView);
        return $c->render();
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-25
 * Time: 16:59
 */