<?php
require_once("LoginController.php");
require_once("RegisterController.php");
require_once("./src/view/URLView.php");



class MasterController {
    //private $loginController;
    //private $RegisterController;
    private $urlView;

    // Construct initializing my 2 other controllers. and Inject URLView to them as dependency.
    public function __construct(){
        $this->urlView = new URLView();

        /*var_dump($this->urlView->GetPath());
            $this->RegisterController = new RegisterController($this->urlView);

        //beroende pa path instanciera rätt kontroller.
        $this->loginController = new LoginController($this->urlView);
        */

    }
    // Return dom to index.php
    public function render(){
        if($this->urlView->GetPath()=== 'register'){
            $c = new RegisterController($this->urlView);
            return $c->render();
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