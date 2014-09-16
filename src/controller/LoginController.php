<?php
require_once("./src/view/AuthenticatedView.php");
require_once("./src/view/LoginView.php");
require_once("./src/view/SweDateView.php");

require_once("./src/model/UserModel.php");

require_once("./src/view/CookieView.php");
require_once("./src/helpers/AgentHelper.php");



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

    /**
     * @var CookieView
     */
    private $cookieView;

    /**
     * @var AgentHelper;
     */
    private $agentHelper;




    public  function __construct(){
        $this->authenticatedView = new AuthenticatedView();
        $this->loginView = new LoginView();
        $this->sweDateView = new SweDateView();

        $this->userModel = new UserModel();

        $this->cookieView = new CookieView();
        $this->agentHelper = new AgentHelper();
    }
    public function render(){
        $agent = $this->agentHelper->GetAgent();
        if($this->cookieView->cookieExist()){
            $cookieString = $this->cookieView->load();
            $cookieTime = $this->cookieView->GetExpire();
            // $agent = $this->agentHelper->GetAgent();
            // check userModel if cookie is valid.
            if($this->userModel->checkUnique($cookieString,$cookieTime,$agent)){
                $this->authenticatedView->cookieLoginMSG();
            }
            else{
                $this->loginView->failedCookieMSG();
                $this->cookieView->delete();
            }
        }

        // If authenticated user, check if user pressed Logout. Then logout and present log out message.
        if($this->userModel->IsAuthenticated($agent)){
            if($this->authenticatedView->userLoggedOut()){
                // In here i will destroy cookie. TODO
                $this->userModel->LogOut();
                $this->cookieView->delete();
                $this->loginView->successMSG();
            }
        }
        else{
            // Else if logged out, check if user submit login. Then log in.
            if($this->loginView->userSubmit()){
                // Retrieve username and password string from LoginView from user post..
                $password = $this->loginView->GetPassword();
                $username = $this->loginView->GetUsername();
                $trueAgent = $this->agentHelper->GetAgent();
                //$tAis->userModel->SetAgent($agent);
                //check if successful log in.
                if ($this->userModel->LogIn($username, $password,$trueAgent)) {


                    $this->authenticatedView->successMSG();
                    // Create cookie if user clicked select box in login view.
                        if($this->loginView->wantCookie()){
                            $uniqueString = $this->userModel->GetUnique();
                            $this->cookieView->save($uniqueString);
                            $this->authenticatedView->cookieSuccessMSG();
                        }
                    }
                else{
                    //Present error msg if failed login.
                    $this->loginView->FailedMSG($username,$password);
                }
            }
        }

       // After checking For user input previously, then either show login view or logout view.
        if($this->userModel->IsAuthenticated($agent) ) {
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