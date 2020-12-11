<?php
require_once (File::build_path(array("model","ModelUtilisateur.php"))); 
require_once(File::build_path(Array("lib","Security.php")));// chargement du modèle


class ControllerUtilisateur{
  
    protected static $object="Utilisateur";
  
  
    public static function readAll() {
        $view='list';
        $pagetitle='Liste des utilisateurs';
        $tab_u = ModelUtilisateur::selectAll();
         //appel au modèle pour gerer la BD
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
        if(Session::is_user($login) || Session::is_admin($login)){
            if(ModelUtilisateur::delete($login)==0)
                self::error();
            else{
                if(Session::is_user($login)){
                    session_unset();
                    session_destroy();  
                    setcookie(session_name(),"", time()-1,"/" );
                }
                $tab_u = ModelUtilisateur::selectAll();
                $view = 'deleted';
                $pagetitle = 'Utilisateur supprimé';

                require_once(File::build_path(array("view", "view.php")));
            }
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
        if(Session::is_user($login) || Session::is_admin($login)){
            $u = ModelUtilisateur::select($login);
            $nom=htmlspecialchars("{$u->get('nom')}") ;
            $prenom=htmlspecialchars("{$u->get('prenom')}") ;
            $adresse= htmlspecialchars("{$u->get('adresse')}");
            $adresseMail= htmlspecialchars("{$u->get('adresseMail')}");
            $pays= htmlspecialchars("{$u->get('pays')}");
            $mdp="";
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
            if($_POST["mdp"]==$_POST["mdpconfirm"] && filter_var($_POST['adresseMail'],FILTER_VALIDATE_EMAIL)){
                $mdpcrypte= Security::hacher($_POST["mdp"]);
                $nonce= Security::generateRandomHex();
                if(!(isset($_POST['admin'])))
                    $admin=0;
                else
                    $admin=1;
                $data= array('nom' => $_POST["nom"] , 'prenom' => $_POST["prenom"] , 'adresse' => $_POST["adresse"] , 'adresseMail' => $_POST["adresseMail"], 'pays' => $_POST["pays"] , 'login' => $_POST["login"] , 'mdp' => $mdpcrypte , 'nonce' => $nonce , 'admin' => $admin);
               
                if( ModelUtilisateur::save($data) == 0){
                    self::error();
                }
                else{
                    self::mailUser($_POST['login'],$nonce,$_POST['adresseMail']);
                    $tab_u = ModelUtilisateur::selectAll();
                    $view='created';
                    $pagetitle='Validation création utilisateur';
                    require(File::build_path(Array("view","view.php")));
                }
            }
            else {
                $view='update';
                $action='create';
                $pagetitle='Formulaire de création d\'un utilisateur';
                $login="";
                $nom="";
                $prenom="";
                $pays="";
                $adresse="";
                $adresseMail="";
                $mdp="";
                if($_POST["mdp"]==$_POST["mdpconfirm"])
                    $message="L'adresse email n'est pas valide ! ";
                else
                    $message="Les deux mots de passe ne correspondent pas ! ";
                require (File::build_path(Array("view","view.php")));
        }        
    }

    public static function updated(){
        if(Session::is_user($_POST["login"]) || Session::is_admin($_POST["login"])){
            if($_POST["mdp"]==$_POST["mdpconfirm"]  && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) ){
                $mdpcrypte= Security::hacher($_POST["mdp"]);
                if(!(isset($_POST['admin'])))
                    $admin=0;
                else
                    $admin=1;
                $data= array('nom' => $_POST["nom"] , 'prenom' => $_POST["prenom"] , 'adresse' => $_POST["adresse"] , 'adresseMail' => $_POST["adresseMail"], 'pays' => $_POST["pays"] , 'mdp' => $mdpcrypte , 'admin' => $admin);
                $l=$_POST['login'] ;
                if(ModelUtilisateur::update($data,$l)==0)
                    self::error();
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
                $pays= htmlspecialchars("{$u->get('pays')}");
                $adresse= htmlspecialchars("{$u->get('adresse')}");
                $adresseMail= htmlspecialchars("{$u->get('adresseMail')}");
                $mdp="";
                $tab_u = ModelUtilisateur::selectAll();
                $view='update';
                $pagetitle='Formulaire de mise à jour d\'un utilisateur';
                if($_POST["mdp"]==$_POST["mdpconfirm"])
                    $message="L'adresse email n'est pas valide ! ";
                else
                    $message="Les deux mots de passe ne correspondent pas ! ";
                require (File::build_path(Array("view","view.php")));
            }
        }
        else{
            self::connect();
        }

    }

    public static function validate() {
        if(ModelUtilisateur::select($_GET['login']) && ModelUtilisateur::verif($_GET['nonce'],$_GET['login']))
            ModelUtilisateur::verifierUser($_GET['login']);
        self::readAll();
    }

    public static function mailUser($login,$nonce,$mail){
        $login= rawurlencode($login);
        $nonce= rawurlencode($nonce);
        $texte='<!doctype html>
            <html >
                <head>
                  <meta charset="utf-8">
                  <title>Mail de confirmation</title>
                </head>
                <body>
                  <a href="http://localhost/TD7/index.php?controller=utilisateur&action=validate&login=' . $login . '&nonce=' . $nonce . '"> Validez votre compte </a>
                </body>
                
            </html>';
        mail($mail, "..........." , $texte);
    }

    public static function connect(){
        $view='connect';
        $pagetitle='Page de connexion';
        require(File::build_path(Array("view","view.php")));
    }

    public static function connected(){
        $mdpcrypte= Security::hacher($_POST["mdp"]);
        if(ModelUtilisateur::checkPassword($_POST["login"],$mdpcrypte) && ModelUtilisateur::is_verif($_POST["login"]) ){
            $_SESSION["login"]=$_POST["login"];
            $_SESSION["admin"]=ModelUtilisateur::is_admin($_POST["login"]);
            $u= ModelUtilisateur::select($_POST["login"]);
            $view='detail';
            $pagetitle='Page de détail de l\'utilisateur';
            require (File::build_path(Array("view","view.php")));
        }
        else{
            $view='connect';
            $pagetitle='Page de connexion';
            if(ModelUtilisateur::checkPassword($_POST["login"],$mdpcrypte))
                $message="Veuillez d'abord vérifier votre adresse email !";
            else
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
    public static function addPanier(){
        ModelUtilisateur::addPanier($_GET['idBouleDeNoel']);
        $tab_b = ModelBouleDeNoel::selectAll();
        $controller = 'Utilisateur';
        $view='addpanier';
        $pagetitle='ajout au Panier';
        require(File::build_path(Array("view","view.php")));
    }

    public static function afficher(){
        $tab_panier= $_SESSION['panier'];
        $controller = 'Utilisateur';
        $view='panier';
        $pagetitle='affichage du Panier';
        require(File::build_path(Array("view","view.php")));
    }
}