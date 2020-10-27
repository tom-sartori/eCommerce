<?php

require_once (File::build_path(array("model","ModelFournisseur.php"))); // chargement du modèle
class ControllerFournisseur{
    public static function readAll() {
        $controller='Fournisseur';
        $view='list';
        $pagetitle='Liste des Fournisseurs';
        $tab_f = ModelFournisseur::selectAll();     //appel au modèle pour gerer la BD
        require (File::build_path(array("view","view.php")));
    }
}