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
                                            WHERE categorie = :categorie
                                            AND (theme = 'action' OR theme = 'aventure')");
            $requete->execute(['categorie' => 'serie']);
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
                                           WHERE categorie = :categorie
                                           AND (theme = 'fantastique' OR theme ='science fiction')");
            $requete->execute(['categorie' => 'serie']);
            return $requete->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        
    }


    //toutes les series comedie
    public function get_serie_comedie()
    {
        try{
            $requete = $this->bd->prepare("SELECT * FROM affiche
                                           WHERE categorie = :categorie
                                           AND (theme = 'comedie')");
            $requete->execute(['categorie' => 'serie']);
            return $requete->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Erreur ['. $e->getCode(). '] : '. $e->getMessage(). '</p>');
        }
    }


    //tout les documentaires
    public function get_serie_documentaire()
    {
        try{
            $requete = $this->bd->prepare("SELECT * FROM affiche
                                           WHERE categorie = :categorie
                                           AND (theme = 'documentaire')");
            $requete->execute(['categorie' => 'serie']);
            return $requete->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e) {
            die('Erreur ['. $e->getCode(). '] : '. $e->getMessage(). '</p>');
        }
    }

    // tout les films aventure guerre histoire action
    public function get_film_reel()
    {
        try{
            $requete = $this->bd->prepare("SELECT* FROM affiche
                                          WHERE categorie = :categorie
                                          AND (theme = 'aventure'
                                          OR theme ='guerre'
                                          OR theme ='histoire'
                                          OR theme ='action')");
            $requete->execute(['categorie' => 'film']);
            return $requete->fetchAll(PDO::FETCH_OBJ);

        }catch (PDOException $e) {
            die('Erreur ['. $e->getCode(). '] : '. $e->getMessage(). '</p>');
        }
    }

    // tout les films science fiction fantastique horreur
    public function get_film_ireel()
    {
        try{
            $requete = $this->bd->prepare("SELECT * FROM affiche
                                           WHERE categorie = :categorie
                                           AND (theme = 'science fiction'
                                           OR theme ='fantastique'
                                           OR theme ='horreur')");
            $requete->execute(['categorie' => 'film']);     
            return $requete->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $e) {
            die('Erreur ['. $e->getCode(). '] : '. $e->getMessage(). '</p>');
        }
    }

    // tout les films drame comedie dramataique
    public function get_film_drama()
    {
        try{
            $requete = $this->bd->prepare("SELECT * FROM affiche
                                           WHERE categorie = :categorie
                                           AND (theme = 'drame'
                                           OR theme = 'comedie dramatique')");
            $requete->execute(['categorie' => 'film']);
            return $requete->fetchAll(PDO::FETCH_OBJ);
                            
        }catch(PDOException $e) {
            die('Erreur ['. $e->getCode(). '] : '. $e->getMessage(). '</p>');
        }
    }


    //----------------------------------------------------------------
    //------CRUD----------------------------------------------------------------

    public function get_formulaire_update_affiche($id)
    {
        $id = $_POST['idAffiche'];
        try {
            $requete = $this->bd->prepare('SELECT * FROM affiche WHERE idAffiche=:id');
            $requete->execute(array(':id'=>$id));
            
        } catch (PDOException $e) {
            die('Erreur ['. $e->getCode(). '] : '. $e->getMessage(). '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    
    

    public function set_update_affiche()
    {
       try{
        $requete = $this->bd->prepare("UPDATE affiche SET titre=:t, 
            theme=:th, 
            categorie=:c, 
            anneeSortie=:a, 
            description=:d, 
            prix=:p, 
            imageName=:i 
            WHERE idAffiche=:idA");
        
        $requete->execute(array(':t'=>$_POST["titre"], 
            ':th'=>$_POST["theme"], 
            ':c'=>$_POST["categorie"], 
            ':a'=>$_POST["anneeSortie"], 
            ':d'=>$_POST["description"], 
            ':i'=>$_POST["imageName"]));

       } catch (PDOException $e) {
        die('Erreur ['. $e->getCode(). '] : '. $e->getMessage(). '</p>');
       }
       return $requete->fetchAll(PDO::FETCH_OBJ);
    }  
    

}