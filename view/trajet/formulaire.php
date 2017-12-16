<form method = "get">
	<fieldset class="text-center">
		
	
		<legend> Remplisez votre choix </legend>
		<input type='hidden' name = 'action' value=<?php echo $action ?>>
		<input type="hidden" name="controller" value=<?php echo $controller?>>

		<p class=".col-md-6 .col-md-offset-3">
			<label for="ville_depart_id">Ville depart</label>
			<input type="text" value="<?php echo $user->get('vd');?>" class="google_complete" name="vd" id="ville_depart_id" placeholder="e.g: Montpellier" required/>
		</p>

		<p>
			<label for="ville_arrive_id">Ville arrive</label>
			<input type="text" value="<?php echo $user->get('va');?>" name="va" class="google_complete" id="ville_arrive_id" placeholder="e.g: Paris" required/>
		</p>

		<p>
			<label for="place_id">Nombre de places</label>
			<input type="text" value="<?php echo $user->get('place');?>" name="place" id="place_id" placeholder="e.g: 1,2,3" required/>
		</p>

       <p>
			<label for="date_id">Date</label>
			<input type="date" value="<?php echo $user->get('date');?>" name="date" id="date_id" required/>
		</p>


		<p>
			<input type="submit" value="Envoyer"/>
		</p>

	</fieldset>
</form>

<script type ="text/javascript" src="assets/auto_completion/ville.js?libraries=places&; sensor=false"></script>