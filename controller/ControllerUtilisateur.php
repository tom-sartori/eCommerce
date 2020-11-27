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

    public static function error(){
    
        $view='error';
        $pagetitle='Page d\'erreur ';
        require(File::build_path(Array("view","view.php")));
    }

    public static function create(){
        $view='update';
        $login="";
        $nom="";
        $prenom="";
        $adresse="";
        $adresseMail="";
        $pays="";
        $pagetitle='Formulaire de création d\'un utilisateur';
        require (File::build_path(Array("view","view.php")));
    }

    public static function update(){
        $login= htmlspecialchars("" . $_GET["login"]);
        $u = ModelUtilisateur::select($login);
        $nom=htmlspecialchars("{$u->get('nom')}") ;
        $prenom=htmlspecialchars("{$u->get('prenom')}") ;
        $adresse= htmlspecialchars("{$u->get('adresse')}");
        $adresseMail= htmlspecialchars("{$u->get('adresseMail')}");
        $pays= htmlspecialchars("{$u->get('pays')}");
  
        $tab_u = ModelUtilisateur::selectAll();
        $view='update';
        $pagetitle='Formulaire de mise à jour d\'un Utilisateur';
        require(File::build_path(Array("view","view.php")));

    }

        public static function created(){
        $data= array('nom' => $_POST["nom"] , 'prenom' => $_POST["prenom"] , 'adresse' => $_POST["adresse"] , 'adresseMail' => $_POST["adresseMail"], 'pays' => $_POST["pays"] , 'login' => $_POST["login"]);
        $erreur= ModelUtilisateur::save($data);
        if($erreur == 0){
            $view='error';
            $pagetitle='Erreur création utilisateur';
            require(File::build_path(Array("view","view.php")));
        }
        else{
            $tab_u = ModelUtilisateur::selectAll();
            $view='created';
            $pagetitle='Validation création utilisateur';
            require(File::build_path(Array("view","view.php")));
        }
        
    }

    public static function updated(){
         $data= array('nom' => $_POST["nom"] , 'prenom' => $_POST["prenom"] , 'adresse' => $_POST["adresse"] , 'adresseMail' => $_POST["adresseMail"], 'pays' => $_POST["pays"]);
        $l=$_POST['login'] ;
        $erreur=ModelUtilisateur::update($data,$i);
        if($erreur == 0){
            $view='error';
            $pagetitle='Erreur mise à jour utilisateur';
            require(File::build_path(Array("view","view.php")));
        }
        else{
            $tab_u = ModelUtilisateurr::selectAll();
            $view='updated';
            $pagetitle='Validation mise à jour utilisateur';
            require(File::build_path(Array("view","view.php")));
        }
    }
}