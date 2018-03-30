// marker bugffer
var markers = [];
var idCounter = 1;

/**
 * This will create the map opbject with some options and return it
 * @returns {google_map} created map
 */
function initMap() {
  // set initial options
  let mapOptions = {
    center: { lat: 47.4211, lng: 10.9852 },
    zoom: 2,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  // create the map and place it in the div with the id map
  let map = new google.maps.Map(document.getElementById("map"), mapOptions);

  // create a marker when the user clicks the map
  google.maps.event.addListener(map, "click", function(e) {
    // determine the location where the user clicked
    let location = e.latLng;

    // create a marker and palced it on the map
    let marker = new google.maps.Marker({
      position: location,
      map: map,
      id: idCounter
		});
		markers.push(marker);

		addNewMarker(idCounter);
		idCounter++;

    // attach click event handler to the marker
    google.maps.event.addListener(marker, "click", function(e) {
      let infoWindow = new google.maps.InfoWindow({
        content: "Lat: " + location.lat() + "<br />Lng: " + location.lng()
      });
      infoWindow.open(map, marker);
    });
  });

  return map;
}

// C A L L B A C K  F U N C T I O N S =====================================================
/**
 * Create new marker with fixed position and add it to the map
 * Also saves the marker in a array
 * @param {google map} _map map to add marker
 */
function createMarker(_map) {
  let marker = new google.maps.Marker({
    position: { lat: 47.5001, lng: 30.2 },
    zoom: 9,
    animation: google.maps.Animation.DROP
  });

  marker.setMap(_map);
	markers.push(marker);
	addNewMarker(idCounter);
	idCounter++;
}

/**
 * Removes all markers on the map
 * It will not delete the marker
 */
function clearMarker() {
  // loop throath all elements and removes them from the map
  // by setting the associated map to null
  markers.forEach(element => {
    element.setMap(null);
  });
}

/**
 * Adds a marker from array and moves to the marker
 * @param {google map} _map map to add marker
 * @param {string} selected city
 */
function addMarker(_map, selected) {
  // JSON format
  let places = {
    okinawa: { lat: 26.352699, lng: 127.811726 },
    germany: { lat: 51.924477, lng: 10.47017 },
    russia: { lat: 62.060526, lng: 99.425045 },
    zugspitze: { lat: 47.421239, lng: 10.985365 }
  };

  let marker = new google.maps.Marker({
    position: places[selected], // requires lat and lng as JSON, see function createMarker
    animation: google.maps.Animation.DROP
  });

  // add the marker to the map
  marker.setMap(_map);
  // save the marker
	markers.push(marker);
	addNewMarker(idCounter);
	idCounter++;
  // move map to the marker
  _map.panTo(places[selected]);
}

/**
 * Create a new HTML element and adds it to the document
 * @param {number} _id id for the marker. not used right now
 */
function addNewMarker(_id) {
  let div = document.createElement("li");
  div.setAttribute("id", idCounter);
  div.setAttribute("onclick", "test(this.id)");
  div.innerHTML = " " + idCounter;

  // let markers = document.getElementById("marker");
  // markers.appendChild(div)
  $("#item4 > ul").append(div);
}

/**
 * for testing
 * @param {number} _id id
 */
function test(_id) {
  console.log(_id);
}
// =======================================================================================
