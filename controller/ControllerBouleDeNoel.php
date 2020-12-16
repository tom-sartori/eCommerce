<?php
require_once (File::build_path(array("model","ModelBouleDeNoel.php"))); // chargement du modèle


class ControllerBouleDeNoel{

    protected static $object ="BouleDeNoel";

    public static function readAll() {
        $view='list';
        $pagetitle='Liste des BouleDeNoel';
        $tab_b = ModelBouleDeNoel::selectAll();     //appel au modèle pour gerer la BD
        require (File::build_path(array("view","view.php")));
    }

    public static function read(){
        $idBouleDeNoel = $_GET['idBouleDeNoel'];
        $b = ModelBouleDeNoel::select($idBouleDeNoel);
        if($b == false){
            self::error();
        }
        else {
            $view = 'detail';
            $pagetitle = 'Details boule de noel';
            require(File::build_path(array("view", "view.php")));
        }
    }


    public static function delete() {
        if (Session::is_admin()) {
            $id = ModelBouleDeNoel::delete($_GET['idBouleDeNoel']);

            $tab_b = ModelBouleDeNoel::selectAll();

            $view = 'deleted';
            $pagetitle = 'Boule de Noël supprimée';

            require_once(File::build_path(array("view", "view.php")));
        }
        else
            self::error();
    }

    public static function error(){
        $view='error';
        $pagetitle='Page d\'erreur ';
        require(File::build_path(Array("view","view.php")));
    }

    public static function create(){
        if (Session::is_admin()) {
            $idBouleDeNoel = "";
            $nom = "";
            $couleur = "";
            $taille = "";
            $matiere = "";
            $idFournisseur = "";
            $prix = "";
            $stock = "";

            $view = 'update';
            $pagetitle = 'Formulaire de création d\'une boule de Noël';
            require(File::build_path(array("view", "view.php")));
        }
        else
            self::error();
    }

    public static function update(){
        if (Session::is_admin()) {
            $idBouleDeNoel = htmlspecialchars("" . $_GET["idBouleDeNoel"]);
            $b = ModelBouleDeNoel::select($idBouleDeNoel);
            $nom = htmlspecialchars("{$b->get('nom')}");
            $couleur = htmlspecialchars("{$b->get('couleur')}");
            $taille = htmlspecialchars("{$b->get('taille')}");
            $matiere = htmlspecialchars("{$b->get('matiere')}");
            $idFournisseur = htmlspecialchars("{$b->get('idFournisseur')}");
            $prix = htmlspecialchars("{$b->get('prix')}");
            $stock = htmlspecialchars("{$b->get('stock')}");
            $tab_b = ModelBouleDeNoel::selectAll();

            $view = 'update';
            $pagetitle = 'Formulaire de mise à jour d\'une boule de Noël';
            require(File::build_path(array("view", "view.php")));
        }
        else
            self::error();
    }

    public static function created(){
        if (Session::is_admin()) {
            $data = array('nom' => $_POST["nom"], 'couleur' => $_POST["couleur"], 'taille' => $_POST["taille"], 'matiere' => $_POST["matiere"], 'idFournisseur' => $_POST["idFournisseur"], 'prix' => $_POST["prix"], 'stock' => $_POST["stock"], 'idBouleDeNoel' => $_POST["idBouleDeNoel"]);
            if (ModelBouleDeNoel::save($data) == 0)
                self::error();
            else {
                $tab_b = ModelBouleDeNoel::selectAll();
                $view = 'created';
                $pagetitle = 'Validation création de la boule de Noël';
                require(File::build_path(array("view", "view.php")));
            }
        }
        else
            self::error();
    }

    public static function updated(){
        if (Session::is_admin()) {
            $data = array('nom' => $_POST["nom"], 'couleur' => $_POST["couleur"], 'taille' => $_POST["taille"], 'matiere' => $_POST["matiere"], 'idFournisseur' => $_POST["idFournisseur"], 'prix' => $_POST["prix"], 'stock' => $_POST["stock"]);
            $i = $_POST['idBouleDeNoel'];
            if (ModelBouleDeNoel::update($data, $i) == 0)
                self::error();
            else {
                $tab_b = ModelBouleDeNoel::selectAll();
                $view = 'updated';
                $pagetitle = 'Validation mise à jour de la boule de Noël';
                require(File::build_path(array("view", "view.php")));
            }
        }
        self::error();
    }
}