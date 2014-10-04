<?php
require_once("./src/view/LoggedInView.php");
require_once("./src/view/LoginView.php");
require_once("./src/view/SweDateView.php");

require_once("./src/model/UserModel.php");
require_once("./src/model/UniqueRepository.php");
require_once("./src/model/SessionModel.php");

require_once("./src/view/CookieView.php");
require_once("./src/Helpers/AgentHelper.php");



class LoginController {
    /**
     * @var LoggedInView
     */
    private $loggedInView;
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
     * @var AgentHelper
     */
    private $agentHelper;

    /**
     * @var SessionModel
     */
    private $sessionModel;


    public  function __construct($URLView){
        $this->loggedInView = new LoggedInView($URLView);
        $this->loginView = new LoginView($URLView);
        $this->sweDateView = new SweDateView();

        $this->sessionModel = new SessionModel();
        $this->userModel = new UserModel();

        $this->cookieView = new CookieView();
        $this->agentHelper = new AgentHelper();
    }

    public function render(){
        //Get Client agent,and if session does not exist. Then check if cookie exist, if exist try log in with cookie.
        $agent = $this->agentHelper->GetAgent();
        if(!$this->userModel->IsAuthenticated($agent) && $this->cookieView->cookieExist()){
            $cookieString = $this->cookieView->load();
            // check userModel if cookie is a valid cookie, if valid cookie set session with user agent.
            if($this->userModel->cookieLogin($cookieString,$agent)){
                $userID =$this->userModel->GetUserID();
                $userName = $this->userModel->getUsernameByUserID($userID);
                $this->sessionModel->SetUser($userName);
                $this->loggedInView->cookieLoginMSG();
            }
            else{
                $this->loginView->failedCookieMSG();
                $this->cookieView->deleteCookie();
            }
        }

        // If authenticated user, check if user pressed Logout. Then logout and present log out message.
        if($this->userModel->IsAuthenticated($agent)){
            $this->loggedInView->presentUser($this->sessionModel->GetUser());
            if($this->loggedInView->userLoggedOut()){
                $this->userModel->logOut();
                $this->cookieView->deleteCookie();
                $this->loginView->logoutMSG();
            }
        }
        else{
            // Else if logged out, check if user submit login. Then log in.
            if($this->loginView->userSubmit()){
                // Retrieve username and password string from LoginView from user post..
                $password = $this->loginView->GetPassword();
                $username = $this->loginView->GetUsername();
                $trueAgent = $this->agentHelper->GetAgent();

                // Check userModel if user can log in.
                if ($this->userModel->LogIn($username, $password,$trueAgent)) {
                    $this->sessionModel->SetUser($username);
                    $this->loggedInView->successMSG();
                    $this->loggedInView->presentUser($username);

                    // Create cookie if user clicked select box in login view.
                        if($this->loginView->wantCookie()){
                            $uniqueString = $this->userModel->createUniqueKey();
                            $cookieTime = $this->cookieView->save($uniqueString);
                            $uniqueRepository = new UniqueRepository();
                            $uniqueRepository->add($uniqueString,$cookieTime,$this->userModel);
                            $this->loggedInView->cookieSuccessMSG();
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
           return $this->loggedInView->show()
                  . $this->sweDateView->show();
        }
        else{
            return $this->loginView->show()  . $this->sweDateView->show();
        }
    }
    public function registrationMSG(){
        $this->loginView->registrationMSG();
    }
}

/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-09
 * Time: 14:14
 */ 