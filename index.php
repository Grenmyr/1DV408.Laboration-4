<?php
require_once("src/view/HTMLView.php");
require_once("src/controller/LoginController.php");

$htmlView = new HTMLView();
$lc = new LoginController();

$loginContent = $lc->renderLogIn();
$htmlView->echoHTML($loginContent);

// Check if User make post from client.
if($lc->userSubmit()){
    $lc->ValidateLogin();
}


/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-06
 * Time: 09:28
 */ 