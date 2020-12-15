<?php
    $update_b = $_GET['action'] == 'update';
?>

<form method="post" action="index.php?controller=<?= static::$object ?>&action=<?= ($update_b)?'updated':'created'?>"
    <fieldset>
        <legend > Formulaire de création / mise à jour d'un fournisseur : </legend>
        <p>
            <p>
                <label for="nom_id">Nom</label>
                <input type="text" name="nom" id="nom_id" value= "<?= $nom ?>" required/>
            </p>
            <p>
                <label for="adresseMail_id">Adresse Mail</label>
                <input type="email" name="adresseMail" id="adresseMail_id" value="<?= $adresseMail ?>" required/>
            </p>
            <p>
                <label for="adresse_id">Adresse</label>
                <input type="text" name="adresse" id="adresse_id" value="<?= $adresse ?>" required/>
            </p>
            <p>
                <label for="pays_id">Pays</label>
                <input type="text" name="pays" id="pays_id" value="<?= $pays ?>" required/>
            </p>
            <p>
            <?=($update_b)?'<label for="idFournisseur_id">Identifiant fournisseur</label>': ''?>
            <?=($update_b)?'<input type="number" name="idFournisseur" id="idFournisseur_id" value="' . $idFournisseur . '" readonly="readonly"' : '' //Si create, on affiche rien car l'id s'incrémenta automatiquement ?>
            </p>
            <input type="hidden" name="controller" value="<?= static::$object ?>" />
            <input class="envoyer" type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
