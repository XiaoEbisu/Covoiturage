<link rel="stylesheet" href="assets/css/rating.css">

<form method = "get">
	<fieldset>
		<legend class="text-center"><b>Donnez votre avis</b></legend>
		<input type='hidden' name='action' value=<?php echo $action ?>>
		<input type="hidden" name="controller" value=<?php echo $controller?>>
		<input type='hidden' name='IdU' value= <?php echo $idReviewed?>> 

		<div class="row">
			<div class="rating">
			    <span><input type="radio" name="rating" id="str5" value="5" class="hide" data-toggle="tooltip" title="Parfait"><label for="str5"><i class="fa fa-star-o" aria-hidden="true"></i></label></span>
			    <span><input type="radio" name="rating" id="str4" value="4" class="hide" data-toggle="tooltip" title="Très bien"><label for="str4"><i class="fa fa-star-o" aria-hidden="true"></i></label></span>
			    <span><input type="radio" name="rating" id="str3" value="3" class="hide" data-toggle="tooltip" title="Bien"><label for="str3"><i class="fa fa-star-o" aria-hidden="true"></i></label></span>
			    <span><input type="radio" name="rating" id="str2" value="2" class="hide" data-toggle="tooltip" title="Décevant"><label for="str2"><i class="fa fa-star-o" aria-hidden="true"></i></label></span>
			    <span><input type="radio" name="rating" id="str1" value="1" class="hide" data-toggle="tooltip" title="À éviter"><label for="str1"><i class="fa fa-star-o" aria-hidden="true"></i></label></span>
			</div>
		</div>


			<div class="row">
				<label for="description_id">Description</label>
				<input type="text" value="<?php echo $avis->get('description');?>" name="description" id="description_id" required/>
				<input type="submit" class="btn btn-basic" value="Envoyer" />
			</div>


	</fieldset>
</form>

<script src="assets/js/rating.js"></script>