<?php
    require('../models/Database.php');

    $id = $_GET['id'];


if (isset($_POST['modifier'])) {
    $module_id = $_POST['module_id'];
    $date = $_POST['edt_date'];
    $classe = $_POST['classe'];
    $heure1 = $_POST['heure1'];
    $heure2 = $_POST['heure2'];
    $num_salle = $_POST['num_salle'];

    // Convertir les valeurs de type time au format MySQL (HH:MM:SS)
    $heure1 = date('H:i', strtotime($heure1));
    $heure2 = date('H:i', strtotime($heure2));

    try {
        $database = new Database('localhost', 'root', '', 'esekoly');
        $connexion = $database->getConnection();

        // Vérifier si le module_id existe dans la table de référence (par exemple, table "module")
        $checkModuleQuery = "SELECT module_id FROM module WHERE module_id = :module_id";
        $checkModuleStmt = $connexion->prepare($checkModuleQuery);
        $checkModuleStmt->bindParam(':module_id', $module_id);
        $checkModuleStmt->execute();

        $moduleExists = $checkModuleStmt->fetch();

        if (!$moduleExists) {
            echo "Le module insérer n'existe pas dans la base de données.";
            exit; // Arrêter l'exécution du script si le module n'existe pas
        }

        $query = "UPDATE edt 
        SET classe = :classe, module_id = :module_id, edt_date = :date, heure1 = :heure1, heure2 = :heure2, num_salle = :num_salle 
        WHERE edt_id = :id";
        $stmt = $connexion->prepare($query);

        $stmt->bindParam(':classe', $classe);
        $stmt->bindParam(':module_id', $module_id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':heure1', $heure1);
        $stmt->bindParam(':heure2', $heure2);
        $stmt->bindParam(':num_salle', $num_salle);
        $stmt->bindParam(':id', $id);


        $stmt->execute();

        header('Location: ../views/edt.php');
        exit();
    
    } catch (PDOException $e) {
        echo "Une erreur s'est produite lors de la modification de l'emploi du temps : " . $e->getMessage();
    }
}
?>

