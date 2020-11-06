<?php
require_once (File::build_path(array("model","ModelUtilisateur.php"))); // chargement du modèle


class ControllerUtilisateur{
  
    protected static $object="Utilisateur";
  
  
    public static function readAll() {
        $view='list';
        $pagetitle='Liste des utilisateurs';
        $tab_u = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        require (File::build_path(array("view","view.php")));
    }
  
  
     public static function read(){
        $login = $_GET['login'];
        $u=ModelUtilisateur::select($login);
        if($u==null){
            $view='errorlogin';
            $pagetitle='Erreur utilisateur';
            require (File::build_path(array("view","view.php")));
        }else {
            $view = 'detail';
            $pagetitle = 'Details utilisateur';
            require(File::build_path(array("view", "view.php")));
        }
    }
 
  
      public static function delete() {
        $login = ModelUtilisateur::delete($_GET['login']);

        $tab_u = ModelUtilisateur::selectAll();

        $controller = 'Utilisateur';
        $view = 'deleted';
        $pagetitle = 'Utilisateur supprimé';

        require_once(File::build_path(array("view", "view.php")));
    }
}