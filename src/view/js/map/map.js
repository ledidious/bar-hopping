/**
 * Generator for uniqued IDs
 * Used for location IDs
 */
function guidGenerator() {
    /**
     * @return {string}
     */
    let S4 = function () {
        return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
    };
    return (S4() + S4() + "-" + S4() + "-" + S4() + "-" + S4() + "-" + S4() + S4() + S4());
}

var userPos;

/**
 * map init function
 */
function initMap() {

    // initial options
    let map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 47.4211,
            lng: 10.9852
        },
        zoom: 20,
        mapTypeControlOptions: {
            position: google.maps.ControlPosition.TOP_RIGHT
        },
    });

    // set current pos as center
    if(navigator.geolocation) {
        // watchId is used to clear the watch clearWatch(watchId)
        let watchId = navigator.geolocation.watchPosition(function (_pos) {
            let pos = {
                lat: _pos.coords.latitude,
                lng: _pos.coords.longitude
            };

            document.getElementById('profile').innerHTML = '[' + pos.lat + '] [' + pos.lng + ']';
            console.log('[' + pos.lat + '] [' + pos.lng + ']');
            map.panTo(pos);
        }, showError, {enableHighAccuracy: true, maximumAge: 300, timeout: 27000});
    }

    // add click event listener to create new loctions
    google.maps.event.addListener(map, "click", function (_value) {
        // determine the location the user clicked
        let location = _value.latLng;

        let marker = new google.maps.Marker({
            position: location,
            map: map,
        });
        /**TODO: attach create method to click event
         * process to create tour, rating, and pictures
         */

        // attach click event handler to the marker
        google.maps.event.addListener(_marker, "click", function (e) {
            //TODO: add function to scrolle to the right location inside the list
        });
    });
}

function showError(_error) {
    switch(_error.code) {
        case _error.PERMISSION_DENIED:
            console.error("User denied the request for Geolocation.");
            break;
        case _error.POSITION_UNAVAILABLE:
            console.error("Location information is unavailable.");
            break;
        case _error.TIMEOUT:
            console.error("The request to get user location timed out.");
            break;
        case _error.UNKNOWN_ERROR:
            console.error("An unknown error occurred.");
            break;
    }

}
