<form method = "get">
	<fieldset>

		<legend class="text-center"><h3> Connexion </h3></legend>
		<input type='hidden' name = 'action' value=<?php echo $action ?>>
		<input type="hidden" name="controller" value=<?php echo $controller?>>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="login_id"><b>Login :</b></label>
			<input type="text" name="mail" id="login_id" placeholder="e.g: abc@yopmail.com" required/>
		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="mdp_id"><b>Mot de Passe :</b></label>
			<input type="password" name="mdp" id="mdp_id" size="13" placeholder="e.g: 123456" required/>
		</p>
		</div>

		<p class="text-center">
			<input type="checkbox" checked="checked"> Se souvenir de moi <br>
			<input type="submit" class="btn btn-basic" value="Connexion"/><br>
			<span class="psw"><a href="#">Mot de passe</a> oublié ?</span><br>
			<span class="psw">Vous n'avez pas de compte ? <a href="index.php?action=create&controller=utilisateur"> Créez-le</a></span>
		</p>

	</fieldset>
</form>
