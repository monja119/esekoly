<?php

class HomeController {

    
    public function index() {
        if(isset($_SESSION['user_id'])){
            echo 'logged in';
        }   
        else{
            require_once('views/HomePage.php');
        }
    }
    
}

?>