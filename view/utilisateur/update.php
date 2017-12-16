<form method = "get">
	<fieldset>
		
		<?php 
			if ($verif == "mdp"){
				echo '<div class= "alert alert-danger text-center"> ';
				echo "$message";
				echo '</div>';
			} 
			elseif ($verif == "mail"){
				echo '<div class= "alert alert-danger text-center"> ';
				echo "$message";
				echo '</div>';
			}
		?>


		<legend class="text-center"> <?php echo $todo; ?> </legend>
		<input type='hidden' name = 'action' value=<?php echo $action ?>>
		<input type="hidden" name="controller" value=<?php echo $controller?>>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			Les champs * sont obligatoire <br><br>
			<label for="login_id">* Login :</label>
			<input type="text" value="<?php echo $user->get('mail');?>" name="mail" id="login_id" placeholder="e.g: abc@yopmail.com" required/>
		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="nom_id">* Nom :</label>
			<input type="text" value="<?php echo $user->get('nom');?>" name="nom" id="nom_id" placeholder="e.g: Micheal" required/>
		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="prenom_id">* Prénom :</label>
			<input type="text" value="<?php echo $user->get('prenom');?>" name="prenom" id="prenom_id" placeholder="e.g: Jackson" required/>
		</p>
		</div>
		
		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="adresse_id">* Adresse :</label>
			<input type="text" value="<?php echo $user->get('adresse');?>" name="adresse" id="adresse_id" placeholder="e.g: Montpellier, France" required/>
		</p>
		</div>
		
		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="age_id">* Age :</label>
			<input type="text" value="<?php echo $user->get('age');?>" name="age" id="age_id" placeholder="e.g: 18 " required/>
		</p>
		</div>
		
		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="image_id">Image :</label>
			<input type="text" value="<?php echo $user->get('image');?>" name="image" id="image_id" placeholder="e.g: image.jpg" />
		</p>
		</div>

        <div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="mdp_id">* Créez un mot de passe :</label>
			<input type="password" name="mdp" id="mdp_id" size="15" placeholder="e.g: 123456" required/>
		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="verif_mdp_id">* Confirmez votre mot de passe :</label>
			<input type="password" name="verif_mdp" id="verif_mdp_id" size = "10" placeholder="e.g: 123456" required/>
		</p>
		</div>

		<p class="text-center">
			<input type="submit" class=" btn btn-basic" value="Envoyer"/>
		</p>

	</fieldset>
</form>