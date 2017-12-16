<form method = "get">
	<fieldset>
		<legend class="text-center"><?php echo $todo; ?></legend>
		<input type='hidden' name = 'action' value=<?php echo $action ?>>
		<input type="hidden" name="controller" value=<?php echo $controller?>>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="IdV_id">Immatriculation : </label>
			<input type="text" value="<?php echo $voiture->get('IdV');?>" size="20" name="IdV" id="IdV_id" placeholder="e.g: AB-1234" required/>
		</p>
		</div>
	
		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="type_voiture_id">Type voiture : </label>
			<input type="text" value="<?php echo $voiture->get('type');?>" size="20" name="type_voiture" id="type_voiture_id" placeholder="e.g: BMW" required/>
		</p>
		</div>

		<div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="place_id">Nombre de places : </label>
			<input type="text" value="<?php echo $voiture->get('place');?>" size="15" name="place" id="place_id" placeholder="e.g: 1,2,3" required/>
		</p>
		</div>

		<div class="row">
		<p class="text-center">
			<input type="submit" class=" btn btn-basic" value="<?php echo $todo;?>"/>
		</p>
		</div>


	</fieldset>
</form>