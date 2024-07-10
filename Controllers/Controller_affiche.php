<?php 


class Controller_affiche extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render("home");
    }

   // toutes les affiches 
    public function action_all_affiches()
    {
        $m=Affiche::get_model();
        $data=['affiches'=>$m->get_all_affiches()];
        $this->render("all_affiches",$data);
    }


    //tous les disney

    public function action_all_disney()
    {
        $m=Affiche::get_model();
        $data=['affiches'=>$m->get_all_disney()];
        $this->render("all_disney",$data);
    }

    //tous les mangas

    public function action_all_mangas()
    {
        $m=Affiche::get_model();
        $data=['affiches'=>$m->get_all_mangas()];
        $this->render("all_mangas",$data);
    }

    //toutes les series action et aventure

    public function action_serie_action_aventure()
    {
        $m=Affiche::get_model();
        $data=['affiches'=>$m->get_serie_action_aventure()];
        $this->render("serie_action_aventure",$data);
    }

    //toutes les series fantastique et science fiction
    public function action_serie_fantastique_science()
    {
        $m=Affiche::get_model();
        $data=['affiches'=>$m->get_serie_fantastique_science()];
        $this->render("serie_fantastique_science",$data);
    }

    //toutes les series comedie
    public function action_serie_comedie()
    {
        $m=Affiche::get_model();
        $data=['affiches'=>$m->get_serie_comedie()];
        $this->render("serie_comedie",$data);
    }

    //toutes les series documentaires
    public function action_serie_documentaire()
    {
        $m=Affiche::get_model();
        $data=['affiches'=>$m->get_serie_documentaire()];
        $this->render("serie_documentaire",$data);
    }
    

    // tout les films aventure guerre histoire action
    public function action_film_reel()
    {
        $m=Affiche::get_model();
        $data=['affiches'=>$m->get_film_reel()];
        $this->render("film_reel",$data);
    }

    // tout les films fantastique science fiction
    public function action_film_ireel()
    {
        $m=Affiche::get_model();
        $data=['affiches'=>$m->get_film_ireel()];
        $this->render("film_ireel",$data);
    }

    // tout les films drama
    public function action_film_drama()
    {
        $m=Affiche::get_model();
        $data=['affiches'=>$m->get_film_drama()];
        $this->render("film_drama",$data);
    }

    

}