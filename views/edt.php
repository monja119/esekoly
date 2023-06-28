<?php 
    require('../models/Database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/edt.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="containers1">
            <div class="title">
                <span>Emploi du temps</span>
            </div>
            <form action="ajouter_edt.php">
                <button class="ajouter" type="submit">
                    ajouter 
                </button>
            </form>
        </div>
        <?php 
            //connexion au bdd
                $database = new Database('localhost', 'root', '', 'esekoly');

                $connexion = $database->getConnection();
                //requêtes
                $sql = "SELECT * FROM edt ORDER BY edt_date ASC, heure1 ASC";
                $stmt = $connexion->prepare($sql);

                $stmt->execute();

                $rows = $stmt->fetchAll();

                foreach( $rows as $row){
                            
        ?>
        <div class="containers2">
            <div class="test1">
                <div class="date"><?php  echo $row['edt_date'] ?></div>
            </div>
            <div class="test2">
                <div><?php echo $row['module_id'] ?></div>
                <div class="content">
                    <div class="content1">
                        <span><?php echo $row['classe'] ?></span>
                    </div>
                    <div class="content2">
                        <span><?php echo $row['heure1'] ?>-<?php echo $row['heure2'] ?></span>
                    </div>
                    <div class="content3">
                        <span>Salle N°:
                            <?php echo $row['num_salle'] ?></span>
                    </div>
                </div>
            </div>
            <div class="test3">
                <div class="modifier">
                    <a href="modifier_edt.php?id=<?php echo $row['edt_id']; ?>" id="modifier" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </div>
                <div class="supprimer">
                <a href="supprimer_edt.php?id=<?php echo $row['edt_id']; ?>" id="supprimmer"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
           </div>
        </div>
        <?php 
            };
        ?>
    </div>
</body>
</html>