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

  $("#myTable").tablesorter();
});

//sticky nav
window.onscroll = function() {myFunction()};

var header = document.getElementById("navbar");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

