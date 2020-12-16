<?php

require_once(File::build_path(array("model","Model.php")));

class ModelCommande extends Model {
    private $login;
    private $idBouleDeNoel;
    private $dateAchat;
    private $commande;
    private static $idcommande=0;
    protected static $nomTable = 'p_Commande';
    protected static $object= 'Commande';
    protected static $primary= 'login';

    public function __construct($idBouleDeNoel=NULL, $login=NULL, $date=NULL) {
        if (!is_null($idBouleDeNoel) && !is_null($login) && !is_null($date)) {
            $this->idBouleDeNoel = $idBouleDeNoel;
            $this->login = $login;
            $this->dateAchat = $date;
        }
    }

    public  function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public  function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    public static function valideCommande($login){
        try {
            $dateJour=date("Y-m-j");
            $tabCommande = self::nbCommande();
            foreach($tabCommande as $key => $value){
                foreach ($value as $key1=> $value1) {
                    $nbCommande = $value1;
                }
            }
            $panier=array_count_values($_SESSION['panier']);
            var_dump($panier);
            foreach ( $panier as $key=>$value){
                $sql = "INSERT INTO p_Commande(idCommande,idBouleDeNoel,login,dateAchat,quantite) values (:idCommande,:idboule,:idClient,:dateAchat,:quantite)";
                $req_prep = Model::$pdo->prepare($sql);
                $values = array(
                    "idCommande" => $nbCommande,
                    "idboule" => $key,
                    "idClient" => $login,
                    "dateAchat" => $dateJour,
                    "quantite" => $value
                );
                $req_prep->execute($values);
            }
        } catch(PDOException $e){
            if(Conf::getDebug()){
                echo $e->getMessage();
            }
            else{
                echo 'une erreur est survenue';
            }
            die();
        }
    }

    public static function afficherHistorique($login){
        $nomObject = static::$object;
        $class_name = "Model" . ucfirst($nomObject);
        $sql = "SELECT * from p_Commande WHERE login = :login";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "login" => $login,
        );
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        return $tab_gen = $req_prep->fetchAll();
    }

    public static function nbCommande(){
        $rep = Model::$pdo->query("SELECT COUNT(DISTINCT idCommande) FROM p_Commande");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'p_Commande');
        return $rep->fetchAll();
    }
}