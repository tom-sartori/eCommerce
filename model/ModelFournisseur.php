<?php

require_once(File::build_path(array("model","Model.php")));
class ModelFournisseur extends Model {
    private $id_Fournisseur;
    private $nom;
    private $adresse;
    private $adresseMail;
    private $pays;
    protected static $object='p_Fournisseur';
    protected static $primary='id_Fournisseur';

    /**
     * ModelFournisseur constructor.
     * @param $id_Fournisseur
     * @param $nom
     * @param $adresse
     * @param $adresseMail
     * @param $pays
     */
    public function __construct($id_Fournisseur=NULL, $nom=NULL, $adresse=NULL, $adresseMail=NULL, $pays=NULL)
    {
        $this->id_Fournisseur = $id_Fournisseur;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->adresseMail = $adresseMail;
        $this->pays = $pays;
    }

    /**
     * @return mixed
     */
    public function getIdFournisseur()
    {
        return $this->id_Fournisseur;
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