<?php
require_once('models/UserModels.php');

class AuthController{
    public function login(){
        if($_POST){
            $email = $_POST['email'];
            $passwword = $_POST['password'];
                
            echo 'ton mot de passe est '.$passwword;            

        }
        else {
            require_once('views/forms/login.php');
        }

    }
}

?>