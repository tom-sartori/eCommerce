<?php
    $update_b = $_GET['action'] == 'update';
?>

<form method="post" action="index.php?controller=<?= static::$object ?>&action=<?= ($update_b)?'updated':'created'?>"
    <fieldset>
        <legend >Formulaire de création / mise à jour d'une boule de Noël : </legend>
        <p>
            <label for="nom_id">Nom</label>
            <input type="text" name="nom" id="nom_id" value="<?= $nom ?>" required/>
            <br>
            <label for="couleur_id">Couleur</label>
            <input type="text" name="couleur" id="couleur_id" value="<?= $couleur ?>" required/>
            <br>
            <label for="taille_id">Taille</label>
            <input type="number" name="taille" id="taille_id" value="<?= $taille ?>" required/>
            <br>
            <label for="matiere_id">Matière</label>
            <input type="text" name="matiere" id="matiere_id" value="<?= $matiere ?>" required/>
            <br>
            <label for="prix_id">Prix de la boule</label>
            <input type="number" name="prix" id="prix_id" value="<?= $prix ?>" required/>
            <br>
            <label for="stock_id">Stock</label>
            <input type="number" name="stock" id="stock_id" value="<?= $stock ?>" required/>
            <br>
            <label for="idFournisseur_id">Identifiant fournisseur</label>
            <input type="number" name="idFournisseur" id="idFournisseur_id" value="<?= $idFournisseur ?>" <?= ($update_b)?'readonly="readonly"':'required'?>/>
            <br>
            <label for="idBouleDeNoel_id">Id boule</label>
            <input type="number" name="idBouleDeNoel" id="idBouleDeNoel_id" value="<?= $idBouleDeNoel ?>" <?= ($update_b)?'readonly="readonly"':'required'?>/>
            <br>
            <input type="hidden" name="controller" value="<?= static::$object ?>"/>
            <input class="envoyer" type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>