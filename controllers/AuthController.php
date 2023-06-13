<?php
require_once('config/Database.php');
require_once('config/Render.php');
require_once('models/UserModels.php');


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
            if ($row) {
                // Le mot de passe correspond, l'utilisateur est authentifié
                if(!password_verify($password, $row['password'])){
                    $error_message = 'Mot de passe incorrect';
                    
                    $data = compact('error_message', 'email');
                
                    render('forms/login', 'Identification - Mot de passe incorrect', $data);

                }else{

                    session_start();

                    $_SESSION['id'] = $row['id'];
                    
                    header('Location: /');


                }
                
            } else {
                $error_message = 'Email non existant';
                
                $data = compact('error_message');
                
                render('forms/login', 'Email non existant', $data);
                
            }
            

        }
        else {
            render('forms/login', 'Identification');
            
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

                $data = compact('error_message');
                render('forms/register', 'Erreur de création', $data);
            }
            else {

                // si email nest pas encore utlisé
                
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                if($password != $password2){
                    $error_message = 'les deux mot de passe ne collent pas';
                    
                    $data = compact('error_message');
                    render('forms/register.php', 'Erreur de création', $data);
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
                    
                    // Binding des values
                    $statement->bindParam(':first_name', $first_name);
                    $statement->bindParam(':last_name', $last_name);
                    $statement->bindParam(':birthday', $birthday);
                    $statement->bindParam(':address', $address);
                    $statement->bindParam(':account_type', $account_type);
                    $statement->bindParam(':email', $email);
                    $statement->bindParam(':password', $password);

                    $statement->execute();
                    
                    render('forms/login', 'Identification - Esekoly');
                    exit;
                    
                }
            }

        }

        else {
            render('forms/register', 'Création de compte - Esekoly');
        }
    }


    public function logout(){
        session_start();
        session_destroy();

        header('Location: /');
    }
}

?>