<?php
require_once (File::build_path(array("model","ModelUtilisateur.php"))); 
require_once(File::build_path(Array("lib","Security.php")));// chargement du modèle


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
        if($u==false){
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
        $login=rawurldecode("{$_GET["login"]}");
        if(Session::is_user($login)){
            $login = ModelUtilisateur::delete($_GET['login']);

            $tab_u = ModelUtilisateur::selectAll();

            $controller = 'Utilisateur';
            $view = 'deleted';
            $pagetitle = 'Utilisateur supprimé';

            require_once(File::build_path(array("view", "view.php")));
        }
        else{
            self::connect();
        }
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
        $mdp="";
        $pagetitle='Formulaire de création d\'un utilisateur';
        require (File::build_path(Array("view","view.php")));
    }

    public static function update(){
        $login= htmlspecialchars("" . $_GET["login"]);
        if(Session::is_user($login)){
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
        else{
            self::connect();
        }

    }

        public static function created(){
            if($_POST["mdp"]==$_POST["mdpconfirm"]){
                $mdpcrypte= Security::hacher($_POST["mdp"]);
                $data= array('nom' => $_POST["nom"] , 'prenom' => $_POST["prenom"] , 'adresse' => $_POST["adresse"] , 'adresseMail' => $_POST["adresseMail"], 'pays' => $_POST["pays"] , 'login' => $_POST["login"] , 'mdp' => $mdpcrypte);
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
            else {
            $view='update';
            $pagetitle='Formulaire de création d\'un utilisateur';
            $login="";
            $nom="";
            $prenom="";
            $mdp="";
            $message="Les deux mots de passe ne correspondent pas ! ";
            require (File::build_path(Array("view","view.php")));
        }
        
    }

    public static function updated(){
        if(Session::is_user($_POST["login"])){
            if($_POST["mdp"]==$_POST["mdpconfirm"]){
                $mdpcrypte= Security::hacher($_POST["mdp"]);
                $data= array('nom' => $_POST["nom"] , 'prenom' => $_POST["prenom"] , 'adresse' => $_POST["adresse"] , 'adresseMail' => $_POST["adresseMail"], 'pays' => $_POST["pays"] , 'mdp' => $mdpcrypte );
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
            else {
                $login= htmlspecialchars("" . $_GET["login"]);
                $u = ModelUtilisateur::select($l);
                $nom=htmlspecialchars("{$u->get('nom')}") ;
                $prenom= htmlspecialchars("{$u->get('prenom')}");
                $mdp="";
                $tab_u = ModelUtilisateur::selectAll();
                $view='update';
                $pagetitle='Formulaire de mise à jour d\'un utilisateur';
                $message="Les deux mots de passe ne correspondent pas ! ";
                require (File::build_path(Array("view","view.php")));
            }
        }
        else{
            self::connect();
        }


    }

    public static function connect(){
        $view='connect';
        $pagetitle='Page de connexion';
        require(File::build_path(Array("view","view.php")));
    }

    public static function connected(){
        $mdpcrypte= Security::hacher($_POST["mdp"]);
        if(ModelUtilisateur::checkPassword($_POST["login"],$mdpcrypte)){
            $_SESSION["login"]=$_POST["login"];
            $u= ModelUtilisateur::select($_POST["login"]);
            $view='detail';
            $pagetitle='Page de détail de l\'utilisateur';
            require (File::build_path(Array("view","view.php")));
        }
        else{
            $view='connect';
            $pagetitle='Page de connexion';
            $message="Ces identifiants n'existent pas !";
            require(File::build_path(Array("view","view.php")));
        }
    }

    public static function deconnect(){
        session_unset();
        session_destroy();  
        setcookie(session_name(),"", time()-1,"/" );
        self::readAll();
    }

}