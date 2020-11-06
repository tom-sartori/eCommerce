
<div>
	<form method="post" action="index.php?controller=<?php echo static::$object ?>&action=<?php 
  if($_GET['action']=='create'){ echo 'created' ;}
  else { echo 'updated'; } ?>"  >
    <fieldset>
      <legend >Formulaire de création / mise à jour d'une boule de Noël : </legend>
      <p><style> label{ padding-right: 2.5%; padding-left: 2.5%; } </style>
        <label for="nom_id">Nom</label>
        <label for="couleur_id">Couleur</label> 
        <label for="taille_id">Taille</label> 
        <label for="matiere_id">Matière</label> 
        <label for="prix_id">Prix de la boule</label> 
        <label for="stock_id">Stock </label>
        <label for="idFournisseur_id">Identifiant Fournisseur</label> 
      </p>
      <p>
        <input type="text" name="nom" id="nom_id" value= "<?php echo $nom ?>" required/>
        <input type="text" name="couleur" id="couleur_id" value="<?php echo $couleur ?>" required/>
        <input type="number" name="taille" id="taille_id" value="<?php echo $taille ?>" required/>
        <input type="text" name="matiere" id="matiere_id" value="<?php echo $matiere ?>" required/>
        <input type="number" name="prix" id="prix_id" value="<?php echo $prix ?>" required/>
        <input type="number" name="stock" id="stock_id" value="<?php echo $stock ?>" required/>
        <input type="number" name="idFournisseur" id="idFournisseur_id" value="<?php echo $idFournisseur ?>" required>
        <input type="number" name="idBouleDeNoel" id="idBouleDeNoel_id" value="<?php echo $idBouleDeNoel ?>" <?php 
        if($_GET['action']=='create') 
         {echo "required";} 
        else if($type='create') 
          {echo 'readonly="readonly"';} ?> />
        <input type="hidden" name="controller" value="<?php echo static::$object ?>" />
  	   </p>
      <p>
        <input type="submit" value="Envoyer" />
      </p>
    </fieldset> 
  </form>
</div>
