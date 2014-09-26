<?php
require_once("./src/view/RegisterView.php");
class RegisterController {

    private $registerView;
    public function __construct($URLView){
        $this->registerView = new RegisterView($URLView);
    }
    public function render(){
        return $this->registerView->show();
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-25
 * Time: 16:57
 */