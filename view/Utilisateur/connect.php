<div>
	<form method="post" action="index.php?controller=<?= static::$object ?>&action=connected " >
        <fieldset>
            <legend> Connectez vous ! :</legend>
            <p>
                <?php
                    if(isset($message))
                        echo $message ;
                ?>
            </p>
            <p>
                <label for="login_id"> Login </label>
                <input type="text" name="login" id="login_id" required/>
            </p>
            <p>
                <label for="motdepasse_id"> Mot de passe </label>
                <input type="password" name="mdp" id="motdepasse_id" required/>
            </p>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </fieldset>
    </form>
</div>