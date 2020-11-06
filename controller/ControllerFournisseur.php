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
    
    public static function error(){
    
        $view='error';
        $pagetitle='Page d\'erreur ';
        require(File::build_path(Array("view","view.php")));
    }

    public static function create(){
        $view='update';
        $idFournisseur="";
        $nom="";
        $adresse="";
        $adresseMail="";
        $pays="";
        $pagetitle='Formulaire de création d\'un fournisseur';
        require (File::build_path(Array("view","view.php")));
    }

    public static function update(){
        $idFournisseur= htmlspecialchars("" . $_GET["idFournisseur"]);
        $f = ModelFournisseur::select($idFournisseur);
        $nom=htmlspecialchars("{$f->get('nom')}") ;
        $adresse= htmlspecialchars("{$f->get('adresse')}");
        $adresseMail= htmlspecialchars("{$f->get('adresseMail')}");
        $pays= htmlspecialchars("{$f->get('pays')}");
  
        $tab_f = ModelFournisseur::selectAll();
        $view='update';
        $pagetitle='Formulaire de mise à jour d\'un fournisseur';
        require(File::build_path(Array("view","view.php")));

    }

        public static function created(){
        $data= array('nom' => $_POST["nom"] , 'adresse' => $_POST["adresse"] , 'adresseMail' => $_POST["adresseMail"], 'pays' => $_POST["pays"] , 'idFournisseur' => $_POST["idFournisseur"]);
        $erreur=ModelFournisseur::save($data);
        if($erreur == 0){
            $view='error';
            $pagetitle='Erreru création fournisseur';
            require(File::build_path(Array("view","view.php")));
        }
        else{
            $tab_f = ModelFournisseur::selectAll();
            $view='created';
            $pagetitle='Validation création du fournisseur';
            require(File::build_path(Array("view","view.php")));
        }
    }

    public static function updated(){
         $data= array('nom' => $_POST["nom"] , 'adresse' => $_POST["adresse"] , 'adresseMail' => $_POST["adresseMail"], 'pays' => $_POST["pays"]);
        $i=$_POST['idFournisseur'] ;
        $erreur=ModelFournisseur::update($data,$i);
        if($erreur == 0){
            $view='error';
            $pagetitle='Erreru création fournisseur';
            require(File::build_path(Array("view","view.php")));
        }
        else{
            $tab_f = ModelFournisseur::selectAll();
            $view='updated';
            $pagetitle='Validation mise à jour Fournisseur';
            require(File::build_path(Array("view","view.php")));
        }
    }    
}