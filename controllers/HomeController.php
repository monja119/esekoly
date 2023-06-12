<?php

class HomeController {

    public function index() {
        echo "indexed";
    }
    
    public function updateProfile($id, $data) {
        echo 'updating profile';
        // Redirige vers la page de profil mise à jour
    }
    
    // Autres méthodes liées à la gestion des utilisateurs...
}

?>