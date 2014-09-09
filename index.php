<?php
require_once("src/view/HTMLView.php");
require_once("src/view/LoginView.php");

$htmlView = new HTMLView();
$loginView = new LoginView();
$loginContent = $loginView->showLogin();
$htmlView->echoHTML($loginContent);
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-06
 * Time: 09:28
 */ 