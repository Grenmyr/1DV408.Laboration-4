<?php
require_once("./src/view/AuthenticatedView.php");
require_once("./src/view/LoginView.php");
require_once("./src/view/SweDateView.php");

require_once("./src/model/UserModel.php");



class LoginController {
    private $authenticatedView;
    /**
     * @var LoginView
     */
    private $loginView;
    /**
     * @var SweDateView
     */
    private $sweDateView;

    /**
     * @var UserModel
     */
    private $userModel;






    public  function __construct(){
        $this->authenticatedView = new AuthenticatedView();
        $this->loginView = new LoginView();
        $this->sweDateView = new SweDateView();

        $this->userModel = new UserModel();
    }
    public function render(){
        // If authenticated user, check if user pressed Logout. Then logout and present log out message.
        if($this->userModel->IsAuthenticated()){
            if($this->authenticatedView->userLoggedOut()){
                $this->userModel->LogOut();
                $this->loginView->successMSG();
            }
        }
        else{
            // Else if logged out, check if user submit login. Then log in.
            if($this->loginView->userSubmit()){
                // Retrieve username and password string from LoginView from user post..
                $password = $this->loginView->GetPassword();
                $username = $this->loginView->GetUsername();

                //check if successful log in.
                if ($this->userModel->LogIn($username, $password)) {
                    $this->authenticatedView->successMSG();

                    $this->loginView->saveCookie();
                    }
                else{
                    //Present error msg if failed login.
                    $this->loginView->FailedMSG($username,$password);
                }
            }
        }

       // After checking For user input previously, then either show login view or logout view.
        if($this->userModel->IsAuthenticated() ) {
            // TODO: Måste generera head för de båda vyerna.
           return $this->authenticatedView->show()
                  . $this->sweDateView->show();
        }
        else{
            return $this->loginView->show()  . $this->sweDateView->show();
        }
    }
}

/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-09
 * Time: 14:14
 */ 