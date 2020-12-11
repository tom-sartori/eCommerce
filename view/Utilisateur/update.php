<?php
    $update_b = $_GET['action'] == 'update';
?>

<form method="post" action="index.php?controller=<?= static::$object ?>&action=<?= ($update_b)?'updated':'created'?>"
    <fieldset>
        <legend >Formulaire de création / mise à jour d'un utilisateur : </legend>
        <p>
            <label for="nom_id">Nom</label>
            <label for="prenom_id">Prenom</label>
            <label for="adresseMail_id">Adresse Mail</label>
            <label for="adresse_id">Adresse</label>
            <label for="pays_id">Pays </label>
            <label for="password_id"> Password</label>
            <label for="passwordConfirme_id"> Confirmation password</label>
            <label for="login_id">Login utilisateur</label>
            <label for="mdp_id">Mot de Passe</label> 
            <label for="mdpconfirm_id">Confirm. mot de passe</label>
        </p>
        <p>
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
            <input type="password" name="mdp" id="mdp_id" value="<?= $mdp ?>" required>
            <input type="password" name="mdpconfirm" id="mdpconfirm_id" value="<?= $mdp ?>" required>
            <br>
            <input type="hidden" name="controller" value="<?= static::$object ?>" />
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
