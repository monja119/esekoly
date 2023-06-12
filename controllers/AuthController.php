<?php
require_once('models/UserModels.php');
require_once('models/Database.php');

class AuthController{
    public function login(){

        if($_POST){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            // db
            $database = new Database('localhost', 'user', 'password', 'esekoly');
            
            // obtention de cnx PDO
            $connection = $database -> getConnection();

            // requete
            $query = "SELECT * FROM user WHERE email = :email";
            $statement = $connection->prepare($query);
            
            // Bind des valeurs
            $statement->bindParam(':email', $email);

            $statement->execute();

            // Utilisation de fetch(PDO::FETCH_ASSOC) pour récupérer une seule ligne
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Vérification du résultat
            if ($row && password_verify($password, $row['password'])) {
                // Le mot de passe correspond, l'utilisateur est authentifié
                echo 'logged in: ' . $row['first_name'] . ' - ' . $row['last_name'] . '<br>';
            } else {
                $error_message = 'Identifiant inconnu ou mot de passe incorrect';
                require_once('views/forms/login.php');
            }
            


        }
        else {
            require_once('views/forms/login.php');
        }

    }



    public function register(){

        if($_POST){

            $email = $_POST['email'];   
                
            // db
            $database = new Database('localhost', 'user', 'password', 'esekoly');
            
            // obtention de cnx PDO
            $connection = $database -> getConnection();

            // verification si l'email est déjà utilisé
            $query = "SELECT * FROM user WHERE email = :email";
            $statement = $connection->prepare($query);
            
            // Bind des valeurs
            $statement->bindParam(':email', $email);

            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);

            // Vérification du résultat
            if ($row) {
                $error_message = "l'addresse mail est déjà utilisé";
                require_once('views/forms/register.php');
            }
            else {

                // si email nest pas encore utlisé
                
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                if($password != $password2){
                    $error_message = 'les deux mot de passe ne collent pas';
                    require_once('views/forms/register.php');
                }else{     
                    // hashage de password
                    $password = password_hash($password, PASSWORD_DEFAULT);               
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $address = $_POST['address'];
                    $birthday = $_POST['birthday'];
                    $account_type = $_POST['account_type'];

                    
                    // verification si l'email est déjà utilisé
                    $query = "INSERT INTO `user`
                             (first_name, last_name, email, account_type, birthday, address, password)  
                             VALUES
                            (:first_name, :last_name, :email, :account_type, :birthday, :address,  :password);
                         ";
                    $statement = $connection->prepare($query);
                    
                    // Bind des valeurs
                    $statement->bindParam(':first_name', $first_name);
                    $statement->bindParam(':last_name', $last_name);
                    $statement->bindParam(':birthday', $birthday);
                    $statement->bindParam(':address', $address);
                    $statement->bindParam(':account_type', $account_type);
                    $statement->bindParam(':email', $email);
                    $statement->bindParam(':password', $password);

                    $statement->execute();
                    
                    header("Location: /login");
                    exit;
                    
                }
            }

        }

        else {
            require_once('views/forms/register.php');
        }
    }
}

?>