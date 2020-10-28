<?php

require_once(File::build_path(array("model","Model.php")));

class ModelBouleDeNoel extends Model{
    private $idBouleDeNoel;
    private $nom;
    private $couleur;
    private $taille;
    private $matiere;
    private $idFournisseur;
    private $stock;
    protected static $nomTable = 'p_BouleDeNoel';
    protected static $object='BouleDeNoel';
    protected static $primary = 'idBouleDeNoel';

    /**
     * ModelBouleDeNoel constructor.
     * @param $idBouleDeNoel
     * @param $nom
     * @param $couleur
     * @param $taille
     * @param $matiere
     * @param $fournisseur
     * @param $stocks
     */
    public function __construct($idBouleDeNoel=NULL, $nom=NULL, $couleur=NULL, $taille=NULL, $matiere=NULL, $idFournisseur=NULL, $stock=NULL)
    {
        if (!is_null($idBouleDeNoel) && !is_null($nom) && !is_null($couleur) && !is_null($taille) && !is_null($matiere) && !is_null($stock) && !is_null($if=idFournisseur)) {
            $this->idBouleDeNoel = $idBouleDeNoel;
            $this->nom = $nom;
            $this->couleur = $couleur;
            $this->taille = $taille;
            $this->matiere = $matiere;
            $this->idFournisseur = $idFournisseur;
            $this->stock=$stock;
        }
    }

    /**
     * @return mixed
     */
    public function getIdBouleDeNoel()
    {
        return $this->idBouleDeNoel;
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
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * @return mixed
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * @return mixed
     */
    public function getMatiere()
    {
        return $this->matiere;
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
    public function getStock()
    {
        return $this->stock;
    }



}