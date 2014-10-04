<?php
require_once("LoginController.php");
require_once("RegisterController.php");
require_once("./src/view/URLView.php");



class MasterController {
    /**
     * @var URLView
     */
    private $urlView;

    public function __construct(){
        $this->urlView = new URLView();
    }
    // Return dom to index.php
    public function render(){
        if($this->urlView->GetPath()=== 'register'){
            $controller = new RegisterController($this->urlView);
            $page = $controller->render();
            if($page === null){
                $controller = new LoginController($this->urlView);
                $controller->registrationMSG();
                return $controller->render();
            }
            return $page;
        }
        $controller = new LoginController($this->urlView);
        return $controller->render();
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-25
 * Time: 16:59
 */