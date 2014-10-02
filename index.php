<?php
require_once("src/Helpers/HTMLView.php");
require_once("src/controller/MasterController.php");

$htmlView = new HTMLView();
$mc = new MasterController();
try{
$loginContent = $mc->render();
$htmlView->echoHTML($loginContent);
}
catch (Exception $e){
    header('Location: /error.html');
    die();
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-06
 * Time: 09:28
 */ 