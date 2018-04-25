$(document).ready(function () {

    // Please nest each separate area in a function to limit variable context

    $(".expand-button").each(function () {
        let expander = $(this);

        // Create, prepare and insert icon
        let icon = $("<i class=\"material-icons expand-icon-expanded\">expand_less</i>\n");
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

            icon.toggleClass("expand-icon-expanded");
            icon.toggleClass("expand-icon-collapsed");
        }

        // Collapsed on begin
        if (expander.attr("bh-collapsed") != null) {
            onExpanderClicked();
        }
    });
});
