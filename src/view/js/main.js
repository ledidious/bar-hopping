"use strict";

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
        $(this).hide();
        $("#profile-bar-restore").show();
        $("#profile-bar-save").show();

        $(".profile-info-edit_field").each(function (indexInArray, object) {
            let span = $(object);
            let content = span.text();

            let input = $("<input>");
            input.attr("type", "text");
            input.attr("bh-old-value", content);
            input.addClass("profile-info-edit_field");

            if (content) {
                input.val(content);
            }
            span.replaceWith(input);
        });
    }
);

$("#profile-bar-restore").click(
    /**
     * @param {Event} event
     */
    function (event) {
        $("#profile-bar-edit").show();
        $("#profile-bar-restore").hide();
        $("#profile-bar-save").hide();

        $(".profile-info-edit_field").each(function (indexInArray, object) {
            let input = $(object);
            let content = input.attr("bh-old-value");

            let span = $("<span/>");
            span.addClass("profile-info-edit_field");

            if (content) {
                span.text(content);
            }
            input.replaceWith(span);
        });
    }
);

$("#profile-bar-save").click(
    /**
     * @param {Event} event
     */
    function (event) {
        alert("Not implemented yet");
    }
);

//open file upload dialog/ make a picture
$("#tours-title-actions-add").click(function () {
    $('#pic').click();
});
// if image is selected submit the form to send file to the server
$("#pic").change(() => {
    // get img data
    let form = new FormData(document.getElementById("imgUpload"));
    let file = document.getElementById("pic").files[0];

    if (file) {
        form.append('pic', file);

        //send data to server
        $.ajax({
            type: "POST",
            url: "../../controller/uploadImage.php",
            data: form,
            cache: false,
            contentType: false,
            processData: false,
        })
            .done(_msg => {
                alert(_msg);
            })
            .fail(_msg => {
                alert('Error\n' + _msg);
            })
    }
});

// On document ready
$(document).ready(function () {

    // Toggle description of span with id "profile-info-more_button-span"
    //      Document ready listener because we have to wait for global.js to generate the icon for expander
    function toggleProfileMoreInfo() {
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
    }

    function closePanelsIfMobileView() {
        let width = $(document).width();

        if (width < 800) {
            $(".panel-closer").each(function () {
                let panel = $(this);
                // Init click event to cause closing
                panel.click();
            });
        }
    }

    toggleProfileMoreInfo();
    closePanelsIfMobileView();
});
