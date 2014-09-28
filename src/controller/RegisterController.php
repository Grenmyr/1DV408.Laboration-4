<?php
require_once("./src/view/RegisterView.php");
require_once("./src/model/UserRepository.php");

// Create own or share with LoginController?
require_once("./src/model/UserModel.php");

require_once("./src/Exception/RegisterException.php");
class RegisterController {

    /**
     * @var RegisterView
     */
    private $registerView;
    /**
     * @var UserModel
     */
    private $userModel;

    public function __construct($URLView){
        $this->userModel = new UserModel();
        $this->registerView = new RegisterView($URLView, $this->userModel);

        new UserRepository();
    }
    public function render(){
        $this->registerView->userSubmit();
            // Do something true



        return $this->registerView->show();
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-25
 * Time: 16:57
 */