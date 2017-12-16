<form method = "get">
	<fieldset>
		<legend class="text-center"> Proposer un trajet </legend>
		<input type='hidden' name = 'action' value=<?php echo $action ?>>
		<input type="hidden" name="controller" value=<?php echo $controller?>>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="ville_depart_id">Ville départ : </label>
			<input type="text" value="<?php echo $trajet->get('vd');?>" name="vd" class="google_complete" id="ville_depart_id" placeholder="e.g: Montpellier" required/>
		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="ville_arrive_id">Ville arrivée : </label>
			<input type="text" value="<?php echo $trajet->get('va');?>" size="20" name="va" id="ville_arrive_id" class="google_complete" placeholder="e.g: Paris" required/>
		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="type_voiture_id">Type voiture : </label>
			<select name ="type_voiture">
				<?php foreach ($listVoiture as $v) {
					echo "<option value='". $trajet->get('type_voiture') . "'>". $v->type ."</option>";
				}
				?>
			</select>

		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="place_id">Nombre de places : </label>
			<input type="text" value="<?php echo $trajet->get('place');?>" size="15" name="place" id="place_id" placeholder="e.g: 1,2,3" required/>
		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="adr_RV_id">Adresse rdv : </label>
			<input type="text" value="<?php echo $trajet->get('adv_RV');?>" name="adr_RV" id="adr_RV_id" required/>
		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="adr_DP_id">Adresse Déposée : </label>
			<input type="text" value="<?php echo $trajet->get('adv_DP');?>" size="15" name="adr_DP" id="adr_DP_id" required/>
		</p>
		</div>

		<div class="row">
        <p class="col-lg-7 col-lg-push-5">
			<label for="date_id">Date : </label>
			<input type="date" value="<?php echo $trajet->get('date');?>" name="date" id="date_id" required/>
		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="heure_id">Heure : </label>
			<input type="time" value="<?php echo $trajet->get('heure');?>" name="heure" id="heure_id" required/>
		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="prix_id">Prix : </label>
			<input type="number" value="<?php echo $trajet->get('prix');?>" name="prix" id="prix_id" required/>
		</p>
		</div>

		<div class="row">
		<p class="text-center">
			<input type="submit" class=" btn btn-basic" value="Proposer"/>
		</p>
		</div>
	</fieldset>
</form>