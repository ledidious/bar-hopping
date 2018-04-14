/*
    Function callback called by google maps api. See main.php.
 */

// noinspection JSUnusedGlobalSymbols
function myMap() {

    // set initial options
    let mapOptions = {
        center: {
            lat: 47.4211,
            lng: 10.9852
        },
        zoom: 2,
    };

    // create the map and place it in the div with the id map
    let map = new google.maps.Map(document.getElementById("map"), mapOptions);
}

// Startup
let map;
let locationHandler = new LocationHandler();
locationHandler.linkMap(map);
