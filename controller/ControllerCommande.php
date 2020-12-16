<?php
require_once (File::build_path(array("model","ModelCommande.php")));

class ControllerCommande{
    protected static $object="Commande";


    public static function historiqueCommande(){
        if(isset($_SESSION['login'])){
            $tab_c= ModelCommande::afficherHistorique($_SESSION['login']);
            $controller = 'Commande';
            $view = 'detailCommande';
            $pagetitle = 'Details des commandes';
            require(File::build_path(array("view", "view.php")));
        }else{
            ControllerUtilisateur::connect();
        }
    }

    public static function passerCommande(){
        $tab_b = ModelBouleDeNoel::selectAll();
        if(isset($_SESSION['login'])){
            ModelCommande::valideCommande($_SESSION['login']);
            $_SESSION['panier']=null;
            $controller = 'Commande';
            $view='commandepasse';
            $pagetitle='Commande passé';
            require(File::build_path(Array("view","view.php")));
        }else{
            ControllerUtilisateur::connect();
        }
    }

}