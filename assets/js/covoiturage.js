$().ready(function(){
	var input = $(".google_complete");
	var opt = {
		//types: ['(cities)']
	};

	$.each(input,function(i,o){
		var autocomplete = new google.maps.places.Autocomplete(o, opt);
	});

  var mapProp= {center:new google.maps.LatLng(48.864716, 2.349014),zoom:5,};
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
});

function myMap() {
    

 	var searchBox = document.getElementById('ville_depart_id');
 	

    map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

    var markers = [];

	    searchBox.addListener('places_changed', function() {
	          var places = searchBox.getPlaces();

	          if (places.length == 0) {
	            return;
	          }

	    markers.forEach(function(marker) {
	            marker.setMap(null);
	          });
	          markers = [];     

	    var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
        
}

//ville_depart_id