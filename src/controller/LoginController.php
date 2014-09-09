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
        return $this->loginView->showLogin();
    }
    public function validateLogIn(){
       $this->loginView->GetUserName();

    }
    public  function userSubmit(){
       return $this->loginView->userSubmit();
    }

}

/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-09
 * Time: 14:14
 */ 