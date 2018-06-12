"use strict";

// ===========================================
// T O U R  S T U F F

function addTour() {
    // set which list to add new tour
    let parentListId = $("#select-tour").val(),
        amountTours = document.getElementById(parentListId).querySelectorAll("[type^=tours-list").length,
        tourName = $("#tour-name").val();

    // clone template
    let toursTemp = $("#tours-list-group-temp").clone();
    // set values for new tour list
    toursTemp
        .attr("id", parentListId + "-tour_" + ++amountTours)
        .appendTo("#" + parentListId)
        .removeClass("hide")
        .before('<hr>');

    // set expand behaviour
    const barId = parentListId + "-tour_" + amountTours + "-bars";
    let tourHeading = $(toursTemp.children(".tour-heading"));

    let tourIEle = tourHeading.children("i");
    tourIEle.click(() => {
        onExpanderClicked(tourNameEle, tourIEle);
    });

    let tourNameEle = tourHeading.children("span");
    tourNameEle.attr("bh-expandable", barId);
    tourNameEle.text(tourName);
    tourNameEle.click(() => {
        onExpanderClicked(tourNameEle, tourIEle);
    });

    let barContainer = toursTemp.children("#tour-bar-container");
    $(barContainer).attr("id", barId);

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
// B A R  S T U F F

let markerBuffer = {};

function onAddBar(ele) {
    // open upload image dialog
    if (false) {
        $("#button-add-pic").click();
    }

    let barContainer = $(ele.parent()).parent().siblings("div");
    let barTemp = $("#bar-container-temp").clone(),
        barAmount = barContainer.children().length;
    barTemp
        .attr("id", barContainer.attr("id") + "_" + ++barAmount)
        .appendTo(barContainer)
        .removeClass("hide");

    let barIEle = barTemp.children("i");
    barIEle.click(() => {
        onExpanderClicked(barNameEle, barIEle);
    });

    let barNameEle = barTemp.children("span");
    barNameEle.attr("bh-expandable", barTemp.attr("id") + "-content");
    // change name of bar
    barNameEle.text("Ein Name");
    barNameEle.click(() => {
        onExpanderClicked(barNameEle, barIEle);
    });

    let barContentEle = barTemp.children("div"),
        barImgContainer = barContentEle.children(".tour-bar-image"),
        barDescription = barContentEle.children(".tour-bar-description");

    barContentEle.attr("id", barTemp.attr("id") + "-content");
    barImgContainer.attr("id", barTemp.attr("id") + "-content-image");
    // change content of bar
    barDescription.text("Das soll ein langer Text sein sein sein sein sein sein sein sein sein sein sein ");

    // store marker locally
    let newMarker = new google.maps.Marker({
        position: GeoMarker.getPosition(),
        map: map
    });
    markerBuffer[barTemp.attr("id")] = newMarker;

    // attach click event handler to the marker
    google.maps.event.addListener(newMarker, "click", function (e) {
        //TODO: add function to scroll to the right location inside the list
    });

    let newBarObj = {
        name: barNameEle.text(),
        content: barContentEle.text(),
        // ImgName: null // get imgName
        position: GeoMarker.getPosition(),
    };

    $.ajax({
        method: "POST",
        url: "../../router/location.router.php",
        data: {user: "userId", barData: newBarObj}
    })
        .done(_msg => {
            console.info("Success add Bar\t" + _msg);
        })
        .fail(_msg => {
            console.error("Error add Bar\t" + _msg);
        })
}

function removeMarker(barId) {
    markerBuffer[barId].setMap(null);
    delete markerBuffer[barId];
}

// ==============================================

/* GeoMarker reference https://chadkillingsworth.github.io/geolocation-marker/docs/reference.html
    get position:
        GeoMarker.getPosition() => google.maps.LatLng
                                    lat => GeoMarker.getPosition().lat();
                                    lng => GeoMarker.getPosition().lng();
*/
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
    if (!navigator.geolocation) {
        alert('Your browser does not support geolocation');
    }

}

