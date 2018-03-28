var markers = [];

/**
 * Create new marker with fixed position and add it to the map
 * Also saves the marker in a array
 * @param {google map} _map map to add marker
 */
function createMarker(_map) {
    var marker = new google.maps.Marker({
        position: {lat: 47.5001, lng: 30.2},
        zoom: 9,
        animation: google.maps.Animation.DROP
    });

    marker.setMap(_map);
    markers.push(marker);
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
        "okinawa": {"lat": 26.352699, "lng": 127.811726},
        "germany": {"lat": 51.924477, "lng": 10.470170},
        "russia": {"lat": 62.060526, "lng": 99.425045},
        "zugspitze": {"lat": 47.421239, "lng": 10.985365},
    };

    let marker = new google.maps.Marker({
        position: places[selected], // requires lat and lng as JSON, see function createMarker
        animation: google.maps.Animation.DROP,
    });

    // add the marker to the map
    marker.setMap(_map);
    // save the marker
    markers.push(marker);
    // move map to the marker
    _map.panTo(places[selected]);
}