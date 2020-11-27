<?php
    $update_b = $_GET['action'] == 'update';
?>

<form method="post" action="index.php?controller=<?= static::$object ?>&action=<?= ($update_b)?'updated':'created'?>"
    <fieldset>
        <legend >Formulaire de création / mise à jour d'un utilisateur : </legend>
        <p>
            <label for="nom_id">Nom</label>
            <input type="text" name="nom" id="nom_id" value= "<?= $nom ?>" required/>
            <br>
            <label for="prenom_id">Prenom</label>
            <input type="text" name="prenom" id="prenom_id" value= "<?= $prenom ?>" required/>
            <br>
            <label for="adresseMail_id">Adresse Mail</label>
            <input type="text" name="adresseMail" id="adresseMail_id" value="<?= $adresseMail ?>" required/>
            <br>
            <label for="adresse_id">Adresse</label>
            <input type="text" name="adresse" id="adresse_id" value="<?= $adresse ?>" required/>
            <br>
            <label for="pays_id">Pays </label>
            <input type="text" name="pays" id="pays_id" value="<?= $pays ?>" required/>
            <br>
            <label for="login_id">Login utilisateur</label>
            <input type="text" name="login" id="login_id" value="<?= $login ?>" <?=($update_b)?'readonly="readonly"':'required'?>/>
            <br>
            <input type="hidden" name="controller" value="<?= static::$object ?>" />
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
