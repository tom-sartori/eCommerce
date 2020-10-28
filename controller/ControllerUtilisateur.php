<?php

require_once (File::build_path(array("model","ModelUtilisateur.php"))); // chargement du modèle
class ControllerUtilisateur{
    protected static $object="Utilisateur";
    public static function readAll() {
        $controller='Utilisateur';
        $view='list';
        $pagetitle='Liste des utilisateurs';
        $tab_u = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        require (File::build_path(array("view","view.php")));
    }
}