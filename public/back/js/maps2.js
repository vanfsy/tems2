$(document).on('ready', function(){

	//------- Google Maps ---------//
		  
	// Creating a LatLng object containing the coordinate for the center of the map
	var latlng = new google.maps.LatLng(53.385846,-1.471385);
	  
	// Creating an object literal containing the properties we want to pass to the map  
	var options = {  
		zoom: 15, // This number can be set to define the initial zoom level of the map
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP // This value can be set to define the map type ROADMAP/SATELLITE/HYBRID/TERRAIN
	};  
	// Calling the constructor, thereby initializing the map  
	var map = new google.maps.Map(document.getElementById('map_div'), options);  
	
	// Define Marker properties
	var image = new google.maps.MarkerImage('images/mark1.png',
		new google.maps.Size(36, 42),
		new google.maps.Point(0,0),
		new google.maps.Point(18, 42)
	);

	// Define Marker properties
	var image2 = new google.maps.MarkerImage('images/mark2.png',
		new google.maps.Size(36, 42),
		new google.maps.Point(0,0),
		new google.maps.Point(0, 42)
	);

	// Define Marker properties
	var image3 = new google.maps.MarkerImage('images/mark3.png',
		new google.maps.Size(36, 42),
		new google.maps.Point(0,0),
		new google.maps.Point(0, 42)
	);

	// Define Marker properties
	var image4 = new google.maps.MarkerImage('images/mark4.png',
		new google.maps.Size(36, 42),
		new google.maps.Point(0,0),
		new google.maps.Point(0, 42)
	);

	// Define Marker properties
	var image5 = new google.maps.MarkerImage('images/mark5.png',
		new google.maps.Size(36, 42),
		new google.maps.Point(0,0),
		new google.maps.Point(0, 42)
	);

	// Define Marker properties
	var image6 = new google.maps.MarkerImage('images/mark6.png',
		new google.maps.Size(36, 42),
		new google.maps.Point(0,0),
		new google.maps.Point(0, 42)
	);

	// Define Marker properties
	var image7 = new google.maps.MarkerImage('images/mark1.png',
		new google.maps.Size(36, 42),
		new google.maps.Point(0,0),
		new google.maps.Point(18, 42)
	);

	// Define Marker properties
	var image8 = new google.maps.MarkerImage('images/mark3.png',
		new google.maps.Size(36, 42),
		new google.maps.Point(0,0),
		new google.maps.Point(18, 42)
	);

	
	// Add Marker
	var marker1 = new google.maps.Marker({
		position: new google.maps.LatLng(53.385846,-1.471385), 
		map: map,		
		icon: image // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});	

	// Add Marker
	var marker2 = new google.maps.Marker({
		position: new google.maps.LatLng(53.389000,-1.473000), 
		map: map,		
		icon: image2 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});

	// Add Marker
	var marker3 = new google.maps.Marker({
		position: new google.maps.LatLng(53.381000,-1.471000), 
		map: map,		
		icon: image3 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});

	// Add Marker
	var marker4 = new google.maps.Marker({
		position: new google.maps.LatLng(53.391000,-1.480000), 
		map: map,		
		icon: image4 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});

	// Add Marker
	var marker5 = new google.maps.Marker({
		position: new google.maps.LatLng(53.385000,-1.490000), 
		map: map,		
		icon: image5 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});

	// Add Marker
	var marker6 = new google.maps.Marker({
		position: new google.maps.LatLng(53.385000,-1.500000), 
		map: map,		
		icon: image6 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});

	// Add Marker
	var marker7 = new google.maps.Marker({
		position: new google.maps.LatLng(53.385000,-1.450000), 
		map: map,		
		icon: image7 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});

	// Add Marker
	var marker8 = new google.maps.Marker({
		position: new google.maps.LatLng(53.384000,-1.460000), 
		map: map,		
		icon: image8 // This path is the custom pin to be shown. Remove this line and the proceeding comma to use default pin
	});
	
	// Create information window
	function createInfo(title, content) {
		return '<div class="infowindow"><span>'+ title +'</span>'+content+'</div>';
	} 

});

