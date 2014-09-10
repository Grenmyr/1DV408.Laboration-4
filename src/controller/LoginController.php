<?php
require_once("./src/view/LoginView.php");
require_once("./src/model/UserModel.php");

class LoginController {
    /**
     * @var LoginView
     */
    private $loginView;
    private $userModel;
    public  function __construct(){
        $this->loginView = new LoginView();
        $this->userModel = new UserModel(); // Ej implementerad än
    }
    public function renderLogIn(){
        // Check if User make post from client.
        if($this->loginView->userSubmit()){
            $userName =  $this->loginView->GetUserName();
            $password =  $this->loginView->GetPassword();

            $this->userModel->validateLogIn($userName, $password);
        }

        return $this->loginView->showLogin();
    }

}

/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-09
 * Time: 14:14
 */ 