<?php 


class Controller_admin extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render("home");
    }

    // AFFICHE-------------------------------------------------------------
public function action_formulaire_update_affiche()
    {
        $id = $_GET['idAffiche'];

        $m=Affiche::get_model();
        $data = ['affiche'=>$m->get_formulaire_update_affiche($id)];
        $this->render("formulaire_update_affiche", $data);
    }
    
    
    public function action_admin_all_affiches()
    {
        $m=Affiche::get_model();
        $data=['affiches'=>$m->get_all_affiches()];
        $this->render("admin_all_affiches", $data);
    }

}