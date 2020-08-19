var map;
var geocoder;

function loadMap(){

	var center = {lat: 34.151353,  lng: -118.255245};
  map = new google.maps.Map(document.getElementById(`map`), {
		zoom: 12,
		center: center});
	var marker = new google.maps.Marker({
	position: center,
	map: map
	});

	var cdata = JSON.parse(document.getElementById('data').innerHTML);
	geocoder = new google.maps.Geocoder();
	codeAddress(cdata);
	 var allData = JSON.parse(document.getElementById('allData').innerHTML);
	 showData(allData);

}

function showData(allData){
	Array.prototype.forEach.call(allData, function(data){
		var marker = new google.maps.Marker({
		position: new google.maps.LatLng(data.lat, data.lng),
		map: map})
	});
}

function codeAddress(cdata) {
   Array.prototype.forEach.call(cdata, function(data){
    	var address = data.name + ' ' + data.adresse;
	    geocoder.geocode( { 'address': address}, function(results, status) {
	      if (status == 'OK') {
	        map.setCenter(results[0].geometry.location);
	        var points = {};
	        points.id = data.id;
	        points.lat = map.getCenter().lat();
	        points.lng = map.getCenter().lng();
	        updateCollegeWithLatLng(points);
	      } else {
	        alert('Geocode was not successful for the following reason: ' + status);
	      }
	    });
	});
}


function updateCollegeWithLatLng(points) {
	$.ajax({
		url:"action.php",
		method:"post",
		data: points,
		success: function(res) {
			console.log(res)
		}
	});
}
