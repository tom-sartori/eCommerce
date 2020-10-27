<?php

require_once(File::build_path(array("model","Model.php")));

class ModelBouleDeNoel extends Model{
    private $id_BouleDeNoel;
    private $nom;
    private $couleur;
    private $taille;
    private $matiere;
    private $fournisseur;
    protected static $object='p_BouleDeNoel';
    protected static $primary = 'id_BouleDeNoel';

    /**
     * ModelBouleDeNoel constructor.
     * @param $id_BouleDeNoel
     * @param $nom
     * @param $couleur
     * @param $taille
     * @param $matiere
     * @param $fournisseur
     */
    public function __construct($id_BouleDeNoel=NULL, $nom=NUMM, $couleur, $taille, $matiere, $fournisseur)
    {
        $this->id_BouleDeNoel = $id_BouleDeNoel;
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->taille = $taille;
        $this->matiere = $matiere;
        $this->fournisseur = $fournisseur;
    }

    /**
     * @return mixed
     */
    public function getIdBouleDeNoel()
    {
        return $this->id_BouleDeNoel;
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
    public function getFournisseur()
    {
        return $this->fournisseur;
    }

}