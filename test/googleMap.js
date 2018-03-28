var markers = [];

/**
 * Create new marker and add theme to an map.
 * Also saves the marker in a array.
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
 * removes all markers on map.
 * it will not delete the marker.
 */
function clearMarker() {
    markers.forEach(element => {
        element.setMap(null);
    });

}

function addMarker(_map, selected) {
    let places = {
        "okinawa": {"lat": 26.352699, "lng": 127.811726},
        "germany": {"lat": 51.924477, "lng": 10.470170},
        "russia": {"lat": 62.060526, "lng": 99.425045},
        "zugspitze": {"lat": 47.421239, "lng": 10.985365},
    };

    let marker = new google.maps.Marker({
        position: places[selected],
        animation: google.maps.Animation.DROP,
    });

    marker.setMap(_map);
    markers.push(marker);
    _map.panTo(places[selected]);
}