/**
 * Function to add expander icon and listeners to the given expander button.
 *
 * @param expander
 */
function addExpander(expander) {

    // Create, prepare and insert icon
    let icon = $("<i class=\"material-icons expand-icon expand-icon-expanded\">expand_less</i>\n");
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

}

$(document).ready(function () {

    $(".expand-button").each(function () {
        addExpander($(this));
    })
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

