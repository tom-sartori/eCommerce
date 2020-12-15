<?php

require_once(File::build_path(array("model","Model.php")));

class ModelUtilisateur extends Model{
    private $login;
    private $nom;
    private $prenom;
    private $adresse;
    private $adresseMail;
    private $password;
    private $pays;
    protected static $nomTable = 'p_Utilisateur';
    protected static $object='Utilisateur';
    protected static $primary='login';

  
    public function __construct($login= NULL, $nom=NULL, $prenom=NULL, $adresse=NULL, $adresseMail=NULL, $pays=NULL, $password=NULL) {
        if (!is_null($login) && !is_null($nom) && !is_null($prenom) && !is_null($adresse) && !is_null($adresseMail) && !is_null($pays)) {
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->adresseMail = $adresseMail;
            $this->password=$password;
            $this->pays = $pays;
        }
    }

    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }


    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    public static function checkPassword($login,$mdphache){
        $table_name= self::$nomTable;
        try{
          $rep=Model::$pdo->query("SELECT mdp FROM $table_name WHERE login=\"" . $login . "\"" );
          //$rep->setFetchMode( PDO::FETCH_ASSOC);
          $tab = $rep->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
          if(Conf::getDebug()){
            echo $e->getMessage();
          }
          else{
            echo "Une erreur est survenue";
          }
          die();
        }
        if(isset($tab["mdp"]))
            return $tab["mdp"]==$mdphache;
        else
            return 0;
  }

    public static function addPanier($idboule){
        if (!isset($_SESSION['panier'])){
            $_SESSION['panier']=array($idboule);
        }else {
            array_push($_SESSION['panier'], $idboule);
        }
    }

    public static function valideCommande($login){
        try {
            $dateJour=date("j, n, Y");
            foreach ($_SESSION['panier'] as $key=>$value){
                $sql = "INSERT INTO p_Commande value (=:idboule,=:idClient,=:dateAchat)";
                $req_prep = Model::$pdo->prepare($sql);
                $values = array(
                    "idboule" => $value,
                    "idClient" => $login,
                    "dateAchat" => $dateJour,
                );
                $req_prep->execute($values);
            }
        } catch(PDOException $e){
            if(Conf::getDebug()){
                echo $e->getMessage();
            }
            else{
                echo "Une erreur est survenue";
            }
            die();
        }
    }
}