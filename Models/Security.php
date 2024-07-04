<?php

class Security extends Model
{
    protected $bd;

    private static $instance = null;

    public static function get_model()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Security();
        }
        return self::$instance;
    }

    protected function __construct() {
        parent::__construct();
    }


    // Fonction de validation des données
    private function validData($data) {
        // Supprime les espaces en début et fin de chaîne
        $data = trim($data);
        // Supprime les barres obliques
        $data = stripslashes($data);
        // Convertit les caractères spéciaux en entités HTML
        $data = htmlspecialchars($data);
        return $data;
    }

    // Fonction de hashage du mot de passe, verifie si l'utilisateur existe
    
    public function get_login()
    { 
        try {
            $email = $this->validData($_POST['email']);
            $requete = $this->bd->prepare('SELECT * FROM user WHERE email = :email');
            $requete->execute(array(':email' => $email));


            if ($requete->rowCount() > 0) {
                $user = $requete->fetch(PDO::FETCH_OBJ);
                $password_hash = $user->pswd; // Récupérer le hachage du mot de passe depuis la base de données
                $password = $_POST['password']; // Récupérer le mot de passe entré par l'utilisateur   
                if (password_verify($password, $password_hash)) {
                    // Mot de passe correct, retourner l'utilisateur
                    return $user;
                } else {
                    // Mot de passe incorrect
                    echo "<script>alert('Mot de passe incorrect !');</script>";
                    return false;
                }
            } else {
                // Utilisateur non trouvé
                echo "<script>alert('Adresse email non enregistrée. Veuillez vous inscrire !');</script>";
                return false;
            }
        } catch (PDOException $e) {
            // Gestion des erreurs PDO
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage());
        }
    }

    //....................user registration....................
    public function get_user_registration_valid()
    {   
        $email = $this->validData($_POST['email']);
        $password = $this->validData(password_hash($_POST['password'], PASSWORD_DEFAULT));
        $lastname = $this->validData($_POST['lastname']);
        $firstname = $this->validData($_POST['firstname']);
        
     
        try {
            // Vérifier si l'email existe déjà dans la base de données
            $requete_verification = $this->bd->prepare('SELECT * FROM user WHERE email = :email');
            $requete_verification->execute(array(':email' => $email));
        
            if ($requete_verification->rowCount() > 0) {
                // L'email existe déjà, afficher un message d'erreur
                echo "<script>alert('Cet email est déjà utilisé. Veuillez choisir un autre email.');</script>";
                return false;
            } else {
                // L'email n'existe pas, il faut s'inscription
                // 'user' est le rôle par défaut
                $role = "user";
                $requete_insertion = $this->bd->prepare('INSERT INTO user (idUser, email, pswd, firstname, lastname, role) 
                    VALUES(NULL, :email, :pswd, :firstname, :lastname, :role)');
            
                $requete_insertion->execute(array(
                    ':email' => $email,
                    ':role' => $role,
                    ':pswd' => $password,
                    ':firstname' => $firstname,
                    ':lastname' => $lastname,
                ));
                
                return true;
            }
        } catch (PDOException $e) {
            // Gestion des erreurs PDO
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage());
        }
    }
}
