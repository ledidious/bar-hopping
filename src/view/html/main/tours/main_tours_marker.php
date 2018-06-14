<?php

require_once __DIR__ . "/../../../../model/marker.php";

// This file is used both, to generate html
// - for existing markers and
// - for new dynamically per ajax added markers. For this case, the local variables from the
//   superior script are not embedded in this variable context and needs to be set with default values.
if (!isset($sMarkerHtmlId)) {
    $sMarkerHtmlId = "tours-list-group_0-tour_" . rand(0, 10000) . "-bars_" . rand(0, 10000);
}
if (!isset($oMarker)) {
    // Dummy object
    $oMarker = new marker(null);
}
?>

<html>
    <div id="<?php echo $sMarkerHtmlId ?>" class="tour-bar">
        <div>
            <span class="expand-button tour-bar-title" bh-collapsed
                  bh-expandable="<?php echo $sMarkerHtmlId ?>-content">
                <?php echo $oMarker->getSName() ?>
            </span>
            <div class="tour-bar-actions">
                <input type="hidden" name="markerId" value="<?php echo $oMarker->getIId(); ?>">
                <button class="material-icons" onclick="editMarker(this, event)">edit</button>
                <button class="material-icons" onclick="deleteMarker(this, event)">delete_forever</button>
            </div>
        </div>

        <hr>
        <div class="tour-bar-content" id="<?php echo $sMarkerHtmlId ?>-content">
            <div class="tour-bar-description">
                <?php if (isset($oTour)) {
                    echo $oTour->getMarkerDesc($oMarker->getIId());
                } ?>
            </div>
            <img class="tour-bar-image" src="../../../../../img/beer.png">
        </div>
    </div>
</html>
