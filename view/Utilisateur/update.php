<?php
    $update_b = $_GET['action'] == 'update';
?>

<form method="post" action="index.php?controller=<?= static::$object ?>&action=<?= ($update_b)?'updated':'created'?>"
    <fieldset>
        <legend>
                <?= ($update_b)?'Formulaire de mise à jour d\'un utilisateur : '
                    :'Formulaire d\'inscription d\'un utilisateur : '?>
        </legend>
        <p>
            <p>
                <label for="nom_id">Nom</label>
                <input type="text" name="nom" id="nom_id" value= "<?= $nom ?>" required/>
            </p>
            <p>
                <label for="prenom_id">Prenom</label>
                <input type="text" name="prenom" id="prenom_id" value= "<?= $prenom ?>" required/>
            </p>
            <p>
                <label for="adresseMail_id">Adresse Mail</label>
                <input type="email" size="30" name="adresseMail" id="adresseMail_id" value="<?= $adresseMail ?>" required/>
            </p>
            <p>
                <label for="adresse_id">Adresse</label>
                <input type="text" name="adresse" id="adresse_id" value="<?= $adresse ?>" required/>
            </p>
            <p>
                <label for="pays_id">Pays </label>
                <select name="pays" id="pays_id" required>
                    <option value="France" selected="selected">France </option>
                    <option value="Argentine">Argentine </option>
                    <option value="Mariannes du Nord">Mariannes du Nord </option>
                    <option value="Swaziland">Swaziland </option>
                    <option value="Tristan da cunha">Tristan de cunha </option>
                </select>
            </p>
            <p>
                <label for="login_id">Login utilisateur</label>
                <input type="text" name="login" id="login_id" value="<?= $login ?>" <?=($update_b)?'readonly="readonly"':'required'?>/>
            </p>
            <p>
                <label for="mdp_id">Mot de Passe</label>
                <input type="password" name="mdp" id="mdp_id" value="<?= $mdp ?>" required>
            </p>
            <p>
                <label for="mdpconfirm_id">Confirm. mot de passe</label>
                <input type="password" name="mdpconfirm" id="mdpconfirm_id" value="<?= $mdp ?>" required>
            </p>
            <?php 
                if(Session::is_admin()){
                    echo '
                        <p> 
                            <div>
                                <label for="admin_id">Est administrateur ?</label>
                                <input type="checkbox" name="admin" value="1" default="0" id="admin_id"';
                                if(Session::is_admin() && $login==$_SESSION['login'])
                                    echo' checked ';
                                echo' >
                            </div>
                        </p> ';
                }
            ?>
            <input type="hidden" name="controller" value="<?= static::$object ?>" />
            <input class="envoyer" type="submit" value="Envoyer" />
            </p>
    </fieldset>
</form>
