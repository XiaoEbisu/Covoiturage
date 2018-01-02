<form method = "get">
	<fieldset>
		<legend class="text-center"><h3><b> Proposer un trajet</b></h3> </legend>
		<input type='hidden' name = 'action' value=<?php echo $action ?>>
		<input type="hidden" name="controller" value=<?php echo $controller?>>

<div class="text-center col-lg-7 col-lg-push-4">
<table>
	<thead>
		<tr>
			<th> </th>
			<th> </th>
		</tr>
	</thead>
		

	<tr>
		<td>
			<label for="ville_depart_id">Ville départ : </label>
			<input type="text" value="<?php echo $trajet->get('vd');?>" name="vd" class="google_complete" id="ville_depart_id" placeholder="e.g: Montpellier" required/>
		</td>

		<td>
			<label for="ville_arrive_id">Ville arrivée : </label>
			<input type="text" value="<?php echo $trajet->get('va');?>" size="20" name="va" id="ville_arrive_id" class="google_complete" placeholder="e.g: Paris" required/>
		</td>
	</tr>

	<tr>
		<td>
			<label for="type_voiture_id">Type voiture : </label>
			<select name ="type_voiture">

				<?php 
				foreach ($listVoiture as $v) {
					echo "<option value='". $v->get('type') . "'>". $v->get('type') ."</option>";
				}
				?>
			</select>
		</td>

		<td>
			<label for="place_id">Nombre de places : </label>
			<input type="text" value="<?php echo $trajet->get('place');?>" size="15" name="place" id="place_id" placeholder="e.g: 1,2,3" required/>
		</td>
	</tr>

		<tr>
			<td>
			<label for="adr_RV_id">Adresse rdv : </label>
			<input type="text" value="<?php echo $trajet->get('adv_RV');?>" name="adr_RV" class="google_complete" id="adr_RV_id" required/>
		</td>

		<td>
			<label for="adr_DP_id">Adresse Déposée : </label>
			<input type="text" value="<?php echo $trajet->get('adv_DP');?>" size="15" class="google_complete" name="adr_DP" id="adr_DP_id" required/>
		</td>
	</tr>

		<tr>
			<td>
			<label for="date_id">Date : </label>
			<input type="date" value="<?php echo $trajet->get('date');?>" name="date" id="date_id" required/>
		</td>

		<td>
			<label for="heure_id">Heure : </label>
			<input type="time" value="<?php echo $trajet->get('heure');?>" name="heure" id="heure_id" required/>
		</td>
	</tr>

	<tr>
		<td>
			<label for="prix_id">Prix (par place) € : </label>
			<input type="number" value="<?php echo $trajet->get('prix');?>" name="prix" id="prix_id" required/>
		</td>
		<td>
			<label>&nbsp </label>
			<input type="submit" class=" btn btn-basic" value="Proposer"/>
		</td>
	</tr>
	</table>
</div>

	</fieldset>
</form>