<?php
    $update_b = $_GET['action'] == 'update';
?>

<form method="post" action="index.php?controller=<?= static::$object ?>&action=<?= ($update_b)?'updated':'created'?>"
    <fieldset>
        <legend>
            <h3>
                <?= ($update_b)?'Préférences utilisateur'
                    :'Formulaire d\'inscription'?>
            </h3>
        </legend>
        <p>
            <label for="nom_id">Nom</label>
            <input type="text" name="nom" id="nom_id" value= "<?= $nom ?>" required/>
            <br>
            <label for="prenom_id">Prenom</label>
            <input type="text" name="prenom" id="prenom_id" value= "<?= $prenom ?>" required/>
            <br>
            <label for="adresseMail_id">Adresse Mail</label>
            <input type="email" size="30" name="adresseMail" id="adresseMail_id" value="<?= $adresseMail ?>" required/>
            <br>
            <label for="adresse_id">Adresse</label>
            <input type="text" name="adresse" id="adresse_id" value="<?= $adresse ?>" required/>
            <br>
            <label for="pays_id">Pays </label>
            <select name="pays" id="pays_id" required>
                <option value="France" selected="selected">France </option>
                <option value="Argentine">Argentine </option>
                <option value="Mariannes du Nord">Mariannes du Nord </option>
                <option value="Swaziland">Swaziland </option>
                <option value="Tristan da cunha">Tristan de cuncha </option>
            </select>
            <br>
            <label for="login_id">Login utilisateur</label>
            <input type="text" name="login" id="login_id" value="<?= $login ?>" <?=($update_b)?'readonly="readonly"':'required'?>/>
            <br>
            <label for="mdp_id">Mot de Passe</label>
            <input type="password" name="mdp" id="mdp_id" value="<?= $mdp ?>" required>
            <br>
            <label for="mdpconfirm_id">Confirm. mot de passe</label>
            <input type="password" name="mdpconfirm" id="mdpconfirm_id" value="<?= $mdp ?>" required>
            <br>
            <input type="hidden" name="controller" value="<?= static::$object ?>" />
            <input class="envoyer" type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
