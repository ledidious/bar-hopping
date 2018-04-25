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

/*
 * Listeners
 */

// Close panels
$(".panel-closer").click(
    /**
     * @param {Event} event
     */
    function (event) {
        let closer = $(event.currentTarget);
        let panel = $(closer.closest(".panel"));

        if (panel != null) {
            panel.hide();
        }

        opener = $("[bh-open_panel='" + panel.attr("id") + "']")
        opener.show();
    }
);

// Open panels
$(".sidebar-item")
    .hide() // Hide on startup
    .click(
        /**
         * @param {Event} event
         */
        function (event) {
            let opener = $(event.currentTarget);
            let panel = $("#" + opener.attr("bh-open_panel"));

            if (panel != null) {
                panel.show();
            }

            opener.hide();
        }
    );

// Switching between read and edit mode
$("#profile-bar-edit").click(
    /**
     * @param {Event} event
     */
    function (event) {

        let editButton = $(event.currentTarget);
        let modeActive = editButton.prop("bh-active");
        modeActive = !modeActive;

        // Toggle state
        editButton.prop("bh-active", modeActive);

        $(".profile-info-edit_field").each(function (indexInArray, object) {

            if (modeActive) {
                let span = $(object);
                let content = span.text();

                let input = $("<input>");
                input.attr("type", "text");
                input.addClass("profile-info-edit_field");

                if (content) {
                    input.val(content);
                }
                span.replaceWith(input);
            }
            else {
                let input = $(object);
                let content = input.val();

                let span = $("<span/>");
                span.addClass("profile-info-edit_field");

                if (content) {
                    span.text(content);
                }
                input.replaceWith(span);
            }
        });
    }
);

// Toggle description of span with id "profile-info-more_button-span"
//      Document ready listener because we have to wait for global.js to generate the icon for expander
$(document).ready(function () {
    let span = $("#profile-info-more_button-span");
    let icon = $("#profile-info-more_button i");

    span.click(toggleDescription);
    icon.click(toggleDescription);

    function toggleDescription() {
        let span = $("#profile-info-more_button-span");

        if (span.prop("bh-expanded")) {
            span.text("Mehr anzeigen");
            span.prop("bh-expanded", false);
        }
        else {
            span.text("Weniger anzeigen");
            span.prop("bh-expanded", true);
        }
    }
});
