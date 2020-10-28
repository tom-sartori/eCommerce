<?php

require_once (File::build_path(array("model","ModelBouleDeNoel.php"))); // chargement du modèle
class ControllerBouleDeNoel{
    protected static $object ="BouleDeNoel";
    public static function readAll() {
        $controller='BouleDeNoel';
        $view='list';
        $pagetitle='Liste des BouleDeNoel';
        $tab_b = ModelBouleDeNoel::selectAll();     //appel au modèle pour gerer la BD
        require (File::build_path(array("view","view.php")));
    }

    public static function read(){
        $idBouleDeNoel = $_GET['idBouleDeNoel'];
        $b=ModelBouleDeNoel::select($idBouleDeNoel);
        if($b==null){
            $controller='BouleDeNoel';
            $view='error';
            $pagetitle='Erreur utilisateur';
            require (File::build_path(array("view","view.php")));
        }else {
            $controller = 'BouleDeNoel';
            $view = 'detail';
            $pagetitle = 'Details boule de noel';
            require(File::build_path(array("view", "view.php")));
        }
    }
}