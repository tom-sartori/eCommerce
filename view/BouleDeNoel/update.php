<?php
    $update_b = $_GET['action'] == 'update';
?>

<form method="post" action="index.php?controller=<?= static::$object ?>&action=<?= ($update_b)?'updated':'created'?>"
    <fieldset>
        <legend >Formulaire de création / mise à jour d'une boule de Noël : </legend>
        <p>
            <label for="nom_id">Nom</label>
            <label for="couleur_id">Couleur</label>
            <label for="taille_id">Taille</label>
            <label for="matiere_id">Matière</label>
            <label for="prix_id">Prix de la boule</label>
            <label for="stock_id">Stock</label>
            <label for="idFournisseur_id">Identifiant fournisseur</label>
            <label for="idBouleDeNoel_id">Id boule</label>
        </p>
        <p>
            <input type="text" name="nom" id="nom_id" value="<?= $nom ?>" required/>
            <input type="text" name="couleur" id="couleur_id" value="<?= $couleur ?>" required/>
            <input type="number" name="taille" id="taille_id" value="<?= $taille ?>" required/>
            <input type="text" name="matiere" id="matiere_id" value="<?= $matiere ?>" required/>
            <input type="number" name="prix" id="prix_id" value="<?= $prix ?>" required/>
            <input type="number" name="stock" id="stock_id" value="<?= $stock ?>" required/>
            <input type="number" name="idFournisseur" id="idFournisseur_id" value="<?= $idFournisseur ?>" <?= ($update_b)?'readonly="readonly"':'required'?>/>
            <input type="number" name="idBouleDeNoel" id="idBouleDeNoel_id" value="<?= $idBouleDeNoel ?>" <?= ($update_b)?'readonly="readonly"':'required'?>/>
            <input type="hidden" name="controller" value="<?= static::$object ?>"/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>