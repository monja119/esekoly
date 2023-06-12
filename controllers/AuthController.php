<?php
require_once('models/UserModels.php');

class AuthController{
    public function login(){
        if($_POST){
            $email = $_POST['email'];
            $passwword = $_POST['password'];


        }
        else {
            echo "no post";
        }

    }
}

?>