<?php
require_once("./src/view/AuthenticatedView.php");
require_once("./src/view/LoginView.php");
require_once("./src/model/SessionModel.php");
require_once("./src/model/UserModel.php");

class LoginController {
    private $authenticatedView;
    /**
     * @var LoginView
     */
    private $loginView;
    /**
     * @var UserModel
     */
    private $userModel;

    public  function __construct(){
        $this->authenticatedView = new AuthenticatedView();
        $this->loginView = new LoginView();
        $this->userModel = new UserModel();
    }
    public function renderLogIn(){
        // If authenticated user, check if user pressed Logout. Then logout.
        if($this->userModel->IsAuthenticated()){
            if($this->authenticatedView->userLoggedOut()){
                $this->userModel->LogOut();
            }
        }
        else{
            // Else if logged out, check if user logged in. Then log in.
            if($this->loginView->userSubmit()){
                // Retrieve username and password string from LoginView from user post..
                $password =  $this->loginView->GetPassword();
                $username =  $this->loginView->GetUsername();
                $this->userModel->LogIn($username, $password);
            }
        }
       // After checking For user input previously, then either show log in view or log out view.
        if($this->userModel->IsAuthenticated() ) {
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