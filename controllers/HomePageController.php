<?php
require_once('config/Render.php');
require_once('config/Database.php');

class HomePageController {

    
    public function index() {
        session_start();

        if(isset($_SESSION['id'])){
            // db
            $database = new Database('localhost', 'user', 'password', 'esekoly');
            
            // obtention de cnx PDO
            $connection = $database -> getConnection();

            // requete
            $query = "SELECT * FROM user WHERE id = :id";
            $statement = $connection->prepare($query);
            
            // Bind des valeurs
            $statement->bindParam(':id', $_SESSION['id']);

            $statement->execute();

            // Utilisation de fetch(PDO::FETCH_ASSOC) pour récupérer une seule ligne
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if(!$user){
                render('forms/login', 'Identification');
            }
            else {
                render('onglets/home', 'Esekoly', compact('user'));
            }

        }   
        else{
            render('HomePage', 'E-Sekoly Page Landing', null, true);
        }
    }

    public function about (){
        render('about', 'A propos', null, true);
    }

    public function contact (){
        render('contact', 'Contact');
    }
    
}

?>