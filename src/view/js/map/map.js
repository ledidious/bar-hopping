"use strict";

// ===========================================
// T O U R  S T U F F

function addTour() {
    // set which list to add new tour
    let parentList = $("#select-tour").val(),
        amountTours = document.getElementById(parentList).querySelectorAll("[type^=tours-list").length,
        tourName = $("#tour-name").val();

    // get template
    let toursTemp = $("#tours-list-group-temp").clone();

    // set values for new tour list
    toursTemp
        .attr("id", parentList + "-tour_" + ++amountTours)
        .appendTo("#" + parentList)
        .removeClass("hide")
        .before('<hr>');

    // set child values
    const barId = parentList + "-tour_" + amountTours + "-bars";
    let children = toursTemp.children();
    children[1].setAttribute("bh-expandable", barId);
    children[1].innerText = tourName;
    children[3].setAttribute("id", barId);

    // update click event
    children[0].addEventListener("click", () => {onExpanderClicked($(children[1]), $(children[0]));});
    children[1].addEventListener("click", () => {onExpanderClicked($(children[1]), $(children[0]));});
    children[2].addEventListener("click", onAddImageClicked);

    /*    $.ajax({
            method: "POST",
            url: "../../router/location.router.php",
            data: {user: "user", tourName: tourName} // TODO set user!!!
        })
            .done(_msg => {
                console.info("Success add Tour\n" + _msg);
            })
            .fail(_msg => {
                console.error("Error add Tour\n" + _msg);
            })*/
}

// ============================================


let map, GeoMarker;

/**
 * map init function
 */
function initMap() {

    // initial options
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 47.4211,
            lng: 10.9852
        },
        zoom: 15,
        mapTypeControlOptions: {position: google.maps.ControlPosition.TOP_RIGHT},
        mapTypeId: google.maps.MapTypeId.SATELLITE,
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
