<?php
    $update_b = $_GET['action'] == 'update';
?>

<form method="post" action="index.php?controller=<?= static::$object ?>&action=<?= ($update_b)?'updated':'create'?>"
    <fieldset>
        <legend >Formulaire de création / mise à jour d'un fournisseur : </legend>
        <p>
            <label for="nom_id">Nom</label>
            <label for="adresse_id">Adresse</label>
            <label for="adresseMail_id">Adresse Mail</label>
            <label for="pays_id">Pays</label>
            <?=($update_b)?'<label for="idFournisseur_id">Identifiant fournisseur</label>': ''?>
        </p>
        <p>
            <input type="text" name="nom" id="nom_id" value= "<?= $nom ?>" required/>
            <input type="text" name="adresse" id="adresse_id" value="<?= $adresse ?>" required/>
            <input type="text" name="adresseMail" id="adresseMail_id" value="<?= $adresseMail ?>" required/>
            <input type="text" name="pays" id="pays_id" value="<?= $pays ?>" required/>
            <?=($update_b)?'<input type="number" name="idFournisseur" id="idFournisseur_id" value="' . $idFournisseur . '" readonly="readonly"' : '' //Si create, on affiche rien car l'id s'incrémenta automatiquement ?>
            <input type="hidden" name="controller" value="<?= static::$object ?>" />
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
