/**
 * This file contains all necessary function and variables for the map
 */

var map;
var localMarker = {}; // contains all markers are connected to the map

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

        // store marker localy
        localMarker[guidGenerator()] = _marker;

        // attach click event handler to the marker
        google.maps.event.addListener(_marker, "click", function (e) {
            //TODO: add function to scrolle to the right location inside the list
        });

        // store marker in the datebase
        $.ajax({
                method: 'POST',
                url: '../router/location.php',
                data: {
                    data: _data
                },
            })
            .done(function (_msg) {
                console.log("Data saved: " + _msg);
            })
            .fail(function (_msg) {
                console.log("ERROR: " + _msg);
            });
    });
}

/**
 * Delete the marker local and removes also the marker from the database
 * DELETE METHOD
 * @param {google.marker} _marker selected marker
 */
function deleteLocation(_marker) {
    $.ajax({
            method: 'DELETE',
            url: '../router/location.php',
            data: {
                data: _data
            },
        })
        .done(function (_msg) {
            console.log('Item Deleted: ' + _msg);
        })
        .fail(function (_msg) {
            console.log('ERROR: ' + _msg);
        });

    // selectedID will be a variable seted by clicking a location from the list
    localMarker[selectedID].setMap(null);
}

/**
 * Change information of given marker
 * PUT METHOD
 * @param {google.marker} _marker selected marker
 */
function changeLocation(_marker) {
    $.ajax({
        method: 'PUT',
        url: '../router/location.php',
        data: {
            data: _data
        },
    })
    .done(function(_msg) {
        console.log('Item changed: ' + _msg);
    })
    .fail(function(_msg) {
        console.log('ERROR: ' + _msg)
    });

    //TODO: change marker localy
}

/**
 * Get all location from user
 * @param {object} _user current user
 */
function getLocation(_user) {
    //TODO: do something with the data

    $.ajax({
        method: 'GET',
        url: '../router/location.router.php',
        data: {user: _user},
    })    
    .done(function(_msg) {
        console.log(_msg);
    })
    .fail(function(_msg) {
        console.log('ERROR: ' + _msg);
    })
}