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

/**
 * map init function
 */

let map, GeoMarker;
function initMap() {

    // initial options
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 47.4211,
            lng: 10.9852
        },
        zoom: 15,
        mapTypeControlOptions: {position: google.maps.ControlPosition.TOP_RIGHT},
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    });

    // track user location and display blue dot ass current position
    GeoMarker = new GeolocationMarker();
    GeoMarker.setCircleOptions({fillColor: '#808080'});
    google.maps.event.addListenerOnce(GeoMarker, 'position_changed', function () {
        map.setCenter(this.getPosition());
        map.fitBounds(this.getBounds());
    });
    google.maps.event.addListener(GeoMarker, 'geolocation_error', function (e) {
        alert('There was an error obtaining your position. Message: ' + e.message);
    });
    GeoMarker.setMap(map);
    google.maps.event.addDomListener(window, 'load', initMap);
    if(!navigator.geolocation) {
        alert('Your browser does not support geolocation');
    }

/*    // add click event listener to create new loctions
    google.maps.event.addListener(map, "click", function (_value) {
        // determine the location the user clicked
        let location = _value.latLng;

        let marker = new google.maps.Marker({
            position: location,
            map: map,
        });
        /!**TODO: attach create method to click event
         * process to create tour, rating, and pictures
         *!/

        // attach click event handler to the marker
        google.maps.event.addListener(_marker, "click", function (e) {
            //TODO: add function to scrolle to the right location inside the list
        });
    });*/
}
