<?php
class HTMLView {
    public function echoHTML($body){
        if($body === null){
            throw new \Exception("HTML is Null");
        }
        echo"
<!DOCTYPE html>
        <html>
        <body>
        $body
        </body>
        </html>";
    }
}
/**
 * Created by PhpStorm.
 * User: dav
 * Date: 2014-09-06
 * Time: 12:38
 */ 