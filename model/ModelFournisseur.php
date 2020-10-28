<?php

require_once(File::build_path(array("model","Model.php")));
class ModelFournisseur extends Model {
    private $idFournisseur;
    private $nom;
    private $adresse;
    private $adresseMail;
    private $pays;
    protected static $nomTable = 'p_Fournisseur';
    protected static $object='Fournisseur';
    protected static $primary='idFournisseur';

    /**
     * ModelFournisseur constructor.
     * @param $idFournisseur
     * @param $nom
     * @param $adresse
     * @param $adresseMail
     * @param $pays
     */
    public function __construct($idFournisseur=NULL, $nom=NULL, $adresse=NULL, $adresseMail=NULL, $pays=NULL)
    {
        if (!is_null($idFournisseur) && !is_null($nom) && !is_null($adresse) && !is_null($pays) && !is_null($adresseMail)) {
            $this->idFournisseur = $idFournisseur;
            $this->nom = $nom;
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
    public function getIdFournisseur()
    {
        return $this->idFournisseur;
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