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
    return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
}


/**
 * map init function
 */
function initMap() {

    // initial options
    let mapOptions = {
        center: {
            lat: 47.4211,
            lng: 10.9852
        },
        zoom: 5,
        mapTypeControl: true,
        mapTypeControlOptions: {
            position: google.maps.ControlPosition.TOP_RIGHT
        },
        zoomControl: true,
        scaleControl: true,
        streetViewControl: true,
    };

    // create the map and place it in the div with the id map
    map = new google.maps.Map(document.getElementById("map"), mapOptions);

    // add click event listener to create new loctions
    google.maps.event.addListener(map, "click", function (_value) {
        // determine the location the user clicked
        let location = _value.latLng;

        let marker = new google.maps.Marker({
            position: location,
            map: map,
        })
        /**TODO: attach create method to click event
         * process to create tour, rating, and pictures
        */

        // attach click event handler to the marker
        google.maps.event.addListener(_marker, "click", function (e) {
            //TODO: add function to scrolle to the right location inside the list
        });
    });

}