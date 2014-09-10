<?php
require_once("./src/view/AuthenticatedView.php");
require_once("./src/view/LoginView.php");
require_once("./src/model/UserModel.php");

class LoginController {
    /**
     * @var LoginView
     */
    private $authenticatedView;
    private $loginView;
    private $userModel;

    public  function __construct(){
        $this->authenticatedView = new AuthenticatedView();
        $this->loginView = new LoginView();
        $this->userModel = new UserModel();

    }
    public function renderLogIn(){
        if($this->userModel->IsAuthenticated()){

        }
        else{
            // Check if User make post from client.
            if($this->loginView->userSubmit()){
                // Retrieve username and password string from user.
                $password =  $this->loginView->GetPassword();
                $username =  $this->loginView->GetUsername();
                $this->userModel->validateLogIn($username, $password);
            }
        }
        // bad solution at the moment, by using a get after Validatelogin i could remove this if Else statement below.
        if($this->userModel->IsAuthenticated()) {
           return $this->authenticatedView->showAuthenticatedView();
        }
        else{
            return $this->loginView->showLogin();
        }
    }

}

/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-09
 * Time: 14:14
 */ 