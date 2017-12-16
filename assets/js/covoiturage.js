$().ready(function(){
	var input = $(".google_complete");
	var opt = {
		types: ['(cities)']
	};

	$.each(input,function(i,o){
		var autocomplete = new google.maps.places.Autocomplete(o, opt);
	});
});