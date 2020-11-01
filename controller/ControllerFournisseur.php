<?php
require_once (File::build_path(array("model","ModelFournisseur.php"))); // chargement du modèle


class ControllerFournisseur{
  
    protected static $object="Fournisseur";
  
  
    public static function readAll() {
        $view='list';
        $pagetitle='Liste des Fournisseurs';
        $tab_f = ModelFournisseur::selectAll();     //appel au modèle pour gerer la BD
        require (File::build_path(array("view","view.php")));
    }
  
  
      public static function read(){
        $idFournisseur = $_GET['idFournisseur'];
        $f=ModelFournisseur::select($idFournisseur);
        if($f==null){
            $view='errorid';
            $pagetitle='Erreur fournisseur';
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

        $view = 'deleted';
        $pagetitle = 'Fournisseur supprimé';

        require_once(File::build_path(array("view", "view.php")));
    }
}