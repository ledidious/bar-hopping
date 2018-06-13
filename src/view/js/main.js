"use strict";

// ==================================================

function displayAddToursDialog(button, event) {
    event.preventDefault();
    showDialog($("#tour-popup-add_tour"));
}

function displayAddMarkerDialog(button, event) {
    event.preventDefault();
    showDialog($("#tour-popup-add_marker"));
}

function showDialog(dialog) {
    dialog.fadeIn();
    $(".popup-window-content", dialog).fadeIn();
}

/*
 * Close dialogs
 */
$(window).click(_event => {
    $(".popup-window").each(function () {
        if (_event.target === this) {
            $(this).fadeOut();
        }
    });
});

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
$("#profile-info_actions-edit").click(
    /**
     * @param {Event} event
     */
    function (event) {
        $(this).hide();
        $("#profile-info_actions-restore").show();
        $("#profile-info_actions-save").show();

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

$("#profile-info_actions-restore").click(
    /**
     * @param {Event} event
     */
    function (event) {
        $("#profile-info_actions-edit").show();
        $("#profile-info_actions-restore").hide();
        $("#profile-info_actions-save").hide();

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

$("#profile-info_actions-save").click(
    /**
     * @param {Event} event
     */
    function (event) {
        alert("Not implemented yet");
    }
);

function addMainTour(button, event) {
    event.preventDefault();

    $.post("/src/router/tour.router.php", $(".tour-add_form").serialize(), function (response) {
        let responseElement = $(response);
        responseElement.appendTo($("#tours-list-group_0"));

        // Add expander
        addExpander($(".expand-button", $(responseElement)));
    });

    $("#tour-popup-add_tour").fadeOut();
}

function addMainMarker(button, event) {
    event.preventDefault();

    let actionsForm = $(button).parent();
    let tourDiv = actionsForm.parent().parent();

    $.post("/src/router/marker.router.php", actionsForm.serialize(), function (response) {
        let responseElement = $(response);
        let barList = $(".tour-bar_list", tourDiv);

        responseElement.appendTo(barList);

        addExpander($(".expand-button", $(responseElement)));
    });

    $("#tour-popup-add_marker").fadeOut();
}

function editTour(button, event) {
    event.preventDefault();

    let form = $(button).parent();

    let newName = prompt("Wie soll die Tour heißen?");
    if (!newName) {
        return;
    }

    $(".expand-button", $(button).parent().parent()).html(newName);

    $.ajax({
        type: "POST",
        url: "/src/router/tour.router.php",
        data: {
            tourName: newName,
            tourId: $("input[name='tourId']", form).val(),
            action: "edit"
        },
    });
}

function deleteTour(button, event) {
    event.preventDefault();

    let form = $(button).parent();

    if (!confirm("Sicher, dass du diese Tour löschen willst?")) {
        return;
    }

    $.ajax({
        type: "POST",
        url: "/src/router/tour.router.php",
        data: {
            tourId: $("input[name='tourId']", form).val(),
            action: "delete"
        }
    })
}

function editMarker(button, event) {
    event.preventDefault();

    let newName = prompt("Wie soll der Marker heißen?");
    if (!newName) {
        return;
    }

    let form = $(button).parent();
    $(".expand-button", $(button).parent().parent()).html(newName);

    $.ajax({
        type: "POST",
        url: "/src/router/marker.router.php",
        data: {
            markerName: newName,
            markerId: $("input[name='markerId']", form).val(),
            action: "edit"
        },
    });
}

function deleteMarker(button, event) {
    event.preventDefault();

    if (!confirm("Sicher, dass du diesen Marker löschen willst?")) {
        return;
    }

    let form = $(button).parent();
    $.ajax({
        type: "POST",
        url: "/src/router/marker.router.php",
        data: {
            markerId: $("input[name='markerId']", form).val(),
            action: "delete"
        },
    });
}

/**
 * upload image
 * if image is selected and submit the form to send the file to the server
 */
$("#button-add-pic").change(() => {
    // get img data
    let form = new FormData(document.getElementById("tours-form-imgUpload"));
    let file = document.getElementById("button-add-pic").files[0];

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
                console.info("Success\n" + _msg);
            })
            .fail(_msg => {
                console.error('Error\t try to upload image\n' + _msg);
            })
    }
});

/*
 * Change password
 */
$("#profile-info-password").click(
    function (event) {
        changePwdPopup.fadeIn();
    }
);

$("#change_pwd-submit").click(
    /**
     * @param {Event} event
     */
    function (event) {
        // Do not submit form synchronous
        event.preventDefault();

        $.post(/* Url to enter */ "/src/view/html/main.php", $("#profile-info-change_pwd-popup-form").serialize());
    }
);

/*
 * Add comment
 */
$(".tours-comment-new-submit").each(function () {
    $(this).click(function (event) {
        event.preventDefault();
        $.post(/* Url to enter*/ "controller", $(this.parentElement).serialize());
    })
});

// ==================================================

// Toggle description of span with id "profile-info-more_button-span"
//      Document ready listener because we have to wait for global.js to generate the icon for expander
$(document).ready(function () {

    function closePanelsIfMobileView() {
        let width = $(document).width();

        if (width < 1000) {
            $(".panel-closer").each(function () {
                let panel = $(this);
                // Init click event to cause closing
                panel.click();
            });
        }
    }

    closePanelsIfMobileView();
});

