<?php

class User extends Model
{
    protected $bd;

    private static $instance = null;

    public static function get_model()
    {
        if (is_null(self::$instance)) {
            self::$instance = new User();
        }
        return self::$instance;
    }
    
    protected function __construct()
    {
        parent::__construct();
    }

    // Méthode pour récupérer tous les utilisateurs
    public function get_all_users()
    {

        try {
            $requete = $this->bd->prepare('SELECT * FROM user');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    // Méthode pour vérifier et récupérer l'utilisateur lors de la connexion
    public function get_login($email, $password)
    {
        try {
            // Valider les données d'entrée
            $email = $this->validData($email);

            // Préparer et exécuter la requête SQL pour récupérer l'utilisateur par email
            $requete = $this->bd->prepare('SELECT * FROM user WHERE email = :email');
            $requete->execute([':email' => $email]);

            // Vérifier si l'utilisateur existe dans la base de données
            if ($requete->rowCount() > 0) {
                $user = $requete->fetch(PDO::FETCH_OBJ);
                $password_hash = $user->pswd; // Récupérer le hachage du mot de passe depuis la base de données
                
                // Vérifier si le mot de passe correspond
                if (password_verify($password, $password_hash)) {
                    // Mot de passe correct, retourner l'utilisateur
                    return $user;
                } else {
                    // Mot de passe incorrect
                    return false;
                }
            } else {
                // Utilisateur non trouvé
                return false;
            }
        } catch (PDOException $e) {
            // Gestion des erreurs PDO
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage());
        }
    }

    // Méthode de validation des données
    private function validData($data)
    {
        // Supprime les espaces en début et fin de chaîne
        $data = trim($data);
        // Supprime les barres obliques
        $data = stripslashes($data);
        // Convertit les caractères spéciaux en entités HTML
        $data = htmlspecialchars($data);
        return $data;
    }

    
    public function registerUser($email, $password, $lastname, $firstname, $username, $birthdate)
    {
        try {
            $role = 'user'; // Par défaut
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->bd->prepare('INSERT INTO users (email, password, lastname, firstname, username, birthdate, role)
                                       VALUES (:email, :password, :lastname, :firstname, :username, :birthdate, :role)');
            $stmt->execute([
                ':email' => $email,
                ':password' => $passwordHash,
                ':lastname' => $lastname,
                ':firstname' => $firstname,
                ':username' => $username,
                ':birthdate' => $birthdate,
                ':role' => $role
            ]);

            return true; // Succès de l'inscription
        } catch (PDOException $e) {
            die('Erreur lors de l\'inscription : ' . $e->getMessage());
        }
    }

    

}



