
<div>
	<form method="post" action="index.php?controller=<?php echo static::$object ?>&action=<?php 
  if($_GET['action']=='create'){ echo 'created' ;}
  else { echo 'updated'; } ?>"  >
    <fieldset>
      <legend >Formulaire de création / mise à jour d'un fournisseur : </legend>
      <p>
        <label for="nom_id">Nom</label>
        <label for="adresse_id">Adresse</label> 
        <label for="adresseMail_id">Adresse Mail</label> 
        <label for="pays_id">Pays </label> 
        <?php //<label for="idFournisseur_id">Identifiant Fournisseur</label> ?>
      </p>
      <p>
        <input type="text" name="nom" id="nom_id" value= "<?php echo $nom ?>" required/>
        <input type="text" name="adresse" id="adresse_id" value="<?php echo $adresse ?>" required/>
        <input type="text" name="adresseMail" id="adresseMail_id" value="<?php echo $adresseMail ?>" required/>
        <input type="text" name="pays" id="pays_id" value="<?php echo $pays ?>" required/>
          <?php /* Car les idFournisseur s'incrémenté automatiquement
          <input type="number" name="idFournisseur" id="idFournisseur_id" value="<?php echo $idFournisseur ?>" <?php
        if($_GET['action']=='create')
         {echo "required";}
        else if($_GET['action']=='update')
          {echo 'readonly="readonly"';} ?> />*/
          ?>
        <input type="hidden" name="controller" value="<?php echo static::$object ?>" />
  	   </p>
      <p>
        <input type="submit" value="Envoyer" />
      </p>
    </fieldset> 
  </form>
</div>