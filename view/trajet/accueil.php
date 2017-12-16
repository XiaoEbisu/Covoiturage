<form method = "get">
	<fieldset>
		<legend class="text-center"> Rechercher votre trajet</legend>
		<input type='hidden' name = 'action' value=<?php echo $action ?>>
		<input type="hidden" name="controller" value=<?php echo $controller?>>

		<div class="row">
		<p class="col-lg-2 col-lg-push-1">
			<label for="ville_depart_id"><i class="fa fa-circle-o" aria-hidden="true"></i> Ville depart :</label>
			<input type="text" name="vd" id="ville_depart_id" placeholder="e.g: Montpellier" class="google_complete" required/>
		</p>
		

		<p class="col-lg-2 col-lg-push-2">
			<label for="ville_arrive_id"><i class="fa fa-map-marker" aria-hidden="true"></i> Ville arrivée :</label>
			<input type="text" name="va" class="google_complete" id="ville_arrive_id" placeholder="e.g: Paris" required/>
		</p>
		

		<!-- <div class="row">
		<p class="col-lg-7 col-lg-push-5">
			<label for="place_id">Nombre de places :</label>
			<input type="text" name="place" id="place_id" size="5" placeholder="e.g: 1,2,3" required/>
		</p>
		</div> -->

       <p class="col-lg-1 col-lg-push-3">
			<label for="date_id"><i class="fa fa-calendar" aria-hidden="true"></i> Date :</label>
			<input type="date" name="date" id="date_id" required/>
		</p>

		<p class="col-lg-1 col-lg-push-5">
			<input type="button" class="btn btn-basic" value="Estimer"/>
		</p>

		<p class="col-lg-1 col-lg-push-5">
			<input type="submit" class="btn btn-basic" value="Chercher"/>
		</p>
	</div>


	<div id="googleMap" bottom="500px" style="width:100%;height:400px;"></div>

    <script>
        function myMap() {
        var mapProp= {center:new google.maps.LatLng(43.675819, 7.289429),zoom:5,};
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);


        var input = document.getElementById('ville_depart_id');
        var searchBox = new google.maps.places.SearchBox(input);
        }
    </script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuYpMjrQ_N5Tz77yUzTKc8B-Eybb1N9Nc&callback=myMap"></script>

	</fieldset>
</form>

