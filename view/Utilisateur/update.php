
<div>
	<form method="post" action="index.php?controller=<?php echo static::$object ?>&action=<?php 
  if($_GET['action']=='create'){ echo 'created' ;}
  else { echo 'updated'; } ?>"  >
    <fieldset>
      <legend >Formulaire de création / mise à jour d'un utilisateur : </legend>
      <p><style> label{ padding-right: 2.5%; padding-left: 2.5%; } </style>
        <label for="nom_id">Nom</label>
        <label for="prenom_id">Prenom</label>
        <label for="adresse_id">Adresse</label> 
        <label for="adresseMail_id">Adresse Mail</label> 
        <label for="pays_id">Pays </label> 
        <label for="login_id">Login utilisateur</label> 
      </p>
      <p>
        <input type="text" name="nom" id="nom_id" value= "<?php echo $nom ?>" required/>
        <input type="text" name="prenom" id="prenom_id" value= "<?php echo $prenom ?>" required/>
        <input type="text" name="adresse" id="adresse_id" value="<?php echo $adresse ?>" required/>
        <input type="text" name="adresseMail" id="adresseMail_id" value="<?php echo $adresseMail ?>" required/>
        <input type="text" name="pays" id="pays_id" value="<?php echo $pays ?>" required/>
        <input type="number" name="login" id="login_id" value="<?php echo $login ?>" <?php 
        if($_GET['action']=='create') 
         {echo "required";} 
        else if($_GET['action']=='update') 
          {echo 'readonly="readonly"';} ?> />
        <input type="hidden" name="controller" value="<?php echo static::$object ?>" />
  	   </p>
      <p>
        <input type="submit" value="Envoyer" />
      </p>
    </fieldset> 
  </form>
</div>
