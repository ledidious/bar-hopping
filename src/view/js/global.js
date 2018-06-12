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

function getInput(val) {
    let input = $("<input>");
    input.attr("type", "text");
    input.val(val);
    return input;
}

function getTextArea(string) {
    let textarea = $("<textarea>");
    textarea.val(string);
    textarea.addClass("text-area");
    return textarea;
}

/**
 * edit tour values
 * change button and add inputs to edit values
 * @param ele button from tour
 */
function onEditTour(ele) {
    // show edit button and hide other buttons
    let tourActions = ele.parent().children();
    tourActions.toggle();

    // tour div
    let tourContainer = $(ele.parent()).parent();

    // tour stuff
    let tourNameElement = tourContainer.children("span"),
        tourName = tourNameElement.text();
    tourNameElement.hide();

    let tourNameInput = getInput(tourName);
    tourNameElement.before(tourNameInput);

    //=======================================
    // marker stuff
    let barsContainer = $("#" + $(tourContainer.parent()).attr("id") + "-bars"),
        barsChildren = barsContainer.children();

    let barElements = [];

    // create input elements for each bar name and content.
    // hide the name element (span) and each content element (div...-content)
    // add new input element for each bar name and content
    for (const bar of barsChildren) {
        // barq is the bar as jquery object
        let barq = $(bar);

        let barNameElement = barq.children("span"),
            barName = barNameElement.text();
        barNameElement.hide();

        let barNameInput = getInput(barName);
        barNameElement.before(barNameInput);

        let barContentContainer = $("#" + barq.attr("id") + "-content"),
            barContentElement = barContentContainer.children(".tour-bar-description"),
            barImage = barContentContainer.children(".tour-bar-image");
        barContentElement.hide();

        let barContentInput = getTextArea(barContentElement.text());
        barContentElement.before(barContentInput);

        // object to store bar elements for future use
        barElements.push({
            barNameEle: barNameElement,
            barNameIn: barNameInput,
            barContentEle: barContentElement,
            barContentIn: barContentInput,
        });
    }

    //========================================

    // tour action buttons
    let okBtn = tourActions[2],
        closeBtn = tourActions[3];

    let changeTextTour = function () {
        if (tourNameInput.val())
            tourNameElement.text(tourNameInput.val());
        changeTextBar();
    };

    let changeTextBar = function () {
        for (const bar of barElements) {
            if (bar.barNameIn.val()) bar.barNameEle.text(bar.barNameIn.val());

            if (bar.barContentIn.val()) bar.barContentEle.text(bar.barContentIn.val());
        }
    };

    // display old tour/ bar element and remove input elements
    let restoreDefault = function () {
        tourActions.toggle();
        tourNameInput.remove();
        tourNameInput = null;
        tourNameElement.toggle();

        for (const bar of barElements) {
            bar.barNameEle.show();
            bar.barContentEle.show();
            bar.barNameIn.remove();
            bar.barContentIn.remove();
        }
        barElements = null;
    };

    // unbind present click listener and attach new one
    $(okBtn).unbind("click");
    $(okBtn).click(function () {
        changeTextTour(tourNameInput.val());
        restoreDefault();
    });
    $(closeBtn).unbind("click");
    $(closeBtn).click(function () {
        restoreDefault();
    });

    $(barImage).unbind("click");
    $(barImage).click(function () {

    });

}

function changeImage() {
    // do chnage image stuff
}
