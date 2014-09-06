<?php
require_once("src/view/HTMLView.php");
require_once("src/view/HomeView.php");

$htmlView = new HTMLView();
$homeView = new HomeView();
$homeContent = $homeView->showHome();
$htmlView->echoHTML($homeContent);
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-06
 * Time: 09:28
 */ 