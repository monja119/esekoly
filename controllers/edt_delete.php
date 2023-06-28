<?php
    require('../models/Database.php');

    if(isset($_POST['supprimer'])){
        $id = $_GET['id'];

        $database = new Database('localhost', 'root', '', 'esekoly');
        

        $connexion = $database->getConnection();

        $sql = "DELETE FROM edt WHERE edt_id = :id";
        $stmt = $connexion->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        header('Location: ../views/edt.php');
        exit();
    }
?>