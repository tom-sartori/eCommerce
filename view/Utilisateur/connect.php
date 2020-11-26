<div>
	<form method="post" action="index.php?controller=<?= static::$object ?>&action=connected " >
    <fieldset>
      <legend> Connectez vous ! :</legend>
      <p><?php if(isset($message)){ echo $message ;}; ?></p>
      <p> <style> label{ padding-right: 4%; padding-left: 4%; } </style>
        <label for="login_id"> Login </label>
        <label for="motdepasse_id"> Mot de passe </label>
      </p>
      <p>
        <input type="text" name="login" id="login_id" required/>
        <input type="password" name="mdp" id="motdepasse_id" required/>
      <p>
        <input type="submit" value="Envoyer" />
      </p>
    </fieldset> 
  </form>
</div>