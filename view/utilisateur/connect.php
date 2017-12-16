<form method = "get">
	<fieldset>

		<legend class="text-center"><h3> Connexion </h3></legend>
		<input type='hidden' name = 'action' value=<?php echo $action ?>>
		<input type="hidden" name="controller" value=<?php echo $controller?>>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="login_id">Login :</label>
			<input type="text" name="mail" id="login_id" placeholder="e.g: abc@yopmail.com" required/>
		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="mdp_id">Mot de Passe :</label>
			<input type="password" name="mdp" id="mdp_id" size="13" placeholder="e.g: 123456" required/>
		</p>
		</div>
		
		<p class="text-center">
			<input type="submit" class="btn btn-basic" value="Connect"/>
		</p>

	</fieldset>
</form>
