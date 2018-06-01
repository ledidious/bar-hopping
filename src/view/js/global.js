$(document).ready(function () {

    // Please nest each separate area in a function to limit variable context

    $(".expand-button").each(function () {
        let expander = $(this);

        // Create, prepare and insert icon
        let icon = $("<i class=\"material-icons expand-icon-expanded\">expand_less</i>\n");
        icon.insertBefore(expander);
        icon.click(function (event) {
            onExpanderClicked(expander, icon);
        }.bind(this));

        // onClick behavior for button
        expander.click(function (event) {
            onExpanderClicked(expander, icon);
        }.bind(this));

        // Collapsed on begin
        if (expander.attr("bh-collapsed") != null) {
            onExpanderClicked(expander, icon);
        }
    });
});

/**
 * Function called by expander button and icon to perform expanding
 * @param expander
 * @param icon
 */
function onExpanderClicked(expander, icon) {
    let targetId = expander.attr("bh-expandable");
    $("#" + targetId).slideToggle();

    icon.toggleClass("expand-icon-expanded");
    icon.toggleClass("expand-icon-collapsed");
}

/**
 * Pipe function to submit hidden form
 */
function onAddImageClicked() {
    $("#button-add-pic").click();
}

/**
 * edit tour values
 * change button and add inputs to edit values
 * @param ele button from tour
 */
function onEditTour(ele) {
    // show edit button and hide other buttons
    ele.parent().children().toggle();

    let tour = $(ele.parent()).parent();

    let tourNameEle = tour.children("span"),
        tourName = tourNameEle.text();

    let tourNameIN = $("<input>");
    tourNameIN.attr("type", "text");
    tourNameIN.attr("bh-old-value", tourName);

    if (tourName)
        tourNameIN.val(tourName);

    tourNameEle.replaceWith(tourNameIN);
}

/**
 * change values from tour
 * @param ele edit button
 */
function onEditAcceptTour(ele) {
    let tour = ele.parent().parent(),
        tourEditInput = tour.children("input"),
        tourEditVal = tourEditInput.val();

    if (!tourEditVal)
        tourEditVal = tourEditInput.attr("bh-old-value");

    tour.children(".tour-actions").children().toggle();

    restoreDefaultTourDesign(tourEditInput, tourEditVal, tour.attr("id"));

    // TODO implement
    /*    $.ajax({

        })*/
}

/**
 * dose not change values from tour
 * @param ele tour
 */
function onEditDenyTour(ele) {
    let tour = ele.parent().parent(),
        tourEditInput = tour.children("input"),
        tourEditVal = tourEditInput.attr("bh-old-value");

    tour.children(".tour-actions").children().toggle();

    restoreDefaultTourDesign(tourEditInput, tourEditVal, tour.attr("id"));
}

/**
 * replace input with span
 * @param tourEditInput reference to input node to replace
 * @param tourEditVal value to set for node
 */
function restoreDefaultTourDesign(tourEditInput, tourEditVal, tourId) {
    let tourDefaultSpan = $("#tours-list-group-temp").children("span").clone();

    tourDefaultSpan.attr("id", tourId + "-bars");
    tourDefaultSpan.attr("bh-expandable", tourId + "-bars");
    tourDefaultSpan.text(tourEditVal);
    tourEditInput.replaceWith(tourDefaultSpan);
}
