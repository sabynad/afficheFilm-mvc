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

    
}