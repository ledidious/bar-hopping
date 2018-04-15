$(document).ready(function () {

    // Please nest each separate area in a function to limit variable context

    $(".expand-button").each(function () {
        let expander = $(this);

        // Create, prepare and insert icon
        let icon = $("<i class=\"material-icons expand-icon_expanded\">expand_less</i>\n");
        icon.insertBefore(expander);
        icon.click(function (event) {
            onExpanderClicked(expander);
        }.bind(this));

        // onClick behavior for button
        expander.click(function (event) {
            onExpanderClicked(expander);
        }.bind(this));

        // Function called by expander button and icon
        function onExpanderClicked() {
            let targetId = expander.attr("bh-expandable");
            $("#" + targetId).slideToggle();

            icon.toggleClass("expand-icon_expanded");
            icon.toggleClass("expand-icon_collapsed");
        }
    });
});
