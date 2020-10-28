<?php

require_once(File::build_path(array("model","Model.php")));

class ModelUtilisateur extends Model{
    private $login;
    private $nom;
    private $prenom;
    private $adresse;
    private $adresseMail;
    private $pays;
    protected static $nomTable = 'p_Utilisateur';
    protected static $object='Utilisateur';
    protected static $primary='login';

    /**
     * ModelUtilisateur constructor.
     * @param $login
     * @param $nom
     * @param $prenom
     * @param $adresse
     * @param $adresseMail
     */
    public function __construct($login= NULL, $nom=NULL, $prenom=NULL, $adresse=NULL, $adresseMail=NULL, $pays=NULL)
    {
        if (!is_null($login) && !is_null($nom) && !is_null($prenom) && !is_null($adresse) && !is_null($adresseMail) && !is_null($pays)) {
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->adresseMail = $adresseMail;
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


    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @return mixed
     */
    public function getAdresseMail()
    {
        return $this->adresseMail;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }




}