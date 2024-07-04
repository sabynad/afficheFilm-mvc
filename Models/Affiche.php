<?php

class Affiche extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Affiche();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }

    // toutes les affiches
    public function get_all_affiches()
    {

        try {
            $requete = $this->bd->prepare('SELECT * FROM affiche');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }


    // tous les disney

    public function get_all_disney()
    {
        try {
            $requete = $this->bd->prepare('SELECT * FROM affiche WHERE categorie = :categorie');
            $requete->execute(['categorie' => 'disney']);
            return $requete->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode(). '] : '. $e->getMessage(). '</p>');
        }
    }
    
    // tous les mangas

    public function get_all_mangas()
    {
        try{
            $requete = $this->bd->prepare('SELECT * FROM affiche WHERE categorie = :categorie');
            $requete->execute(['categorie' =>'mangas']);
            return $requete->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
            die('Erreur [' . $e->getCode(). '] : '. $e->getMessage(). '</p>');
        }
    }
     
    //toutes les series Action - aventure

    public function get_serie_action_aventure()
    {
        try {
            $requete = $this->bd->prepare("SELECT * FROM affiche
                                            WHERE categorie = 'serie'
                                            AND (theme = 'action' OR theme = 'aventure')");
            $requete->execute();
            return $requete->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }

    //toutes les series fantastique et science fiction

    public function get_serie_fantastique_science()
    {
        try {
            $requete = $this->bd->prepare("SELECT * FROM affiche
                                           WHERE categorie = 'serie'
                                           AND (theme = 'fantastique' OR theme ='science fiction')");
            $requete->execute();
            return $requete->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        
    }



}