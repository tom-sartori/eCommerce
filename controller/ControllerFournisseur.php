<?php
require_once (File::build_path(array("model","ModelFournisseur.php"))); // chargement du modèle


class ControllerFournisseur{
  
    protected static $object="Fournisseur";
  
  
    public static function readAll() {
        $controller='Fournisseur';
        $view='list';
        $pagetitle='Liste des Fournisseurs';
        $tab_f = ModelFournisseur::selectAll();     //appel au modèle pour gerer la BD
        require (File::build_path(array("view","view.php")));
    }
  
  
      public static function read(){
        $idFournisseur = $_GET['idFournisseur'];
        $f=ModelFournisseur::select($idFournisseur);
        if($f==null){
            $controller='Fournisseur';
            $view='error';
            $pagetitle='Erreur utilisateur';
            require (File::build_path(array("view","view.php")));
        }else {
            $controller = 'Fournisseur';
            $view = 'detail';
            $pagetitle = 'Details Fournisseur';
            require(File::build_path(array("view", "view.php")));
        }
      }
  
  
      public static function delete() {
        $id = ModelFournisseur::delete($_GET['idFournisseur']);

        $tab_f = ModelFournisseur::selectAll();

        $controller = 'Fournisseur';
        $view = 'deleted';
        $pagetitle = 'Fournisseur supprimé';

        require_once(File::build_path(array("view", "view.php")));
    }
}