<?php

require_once __DIR__ . "/../tours/../../../../model/tour.php";
require_once __DIR__ . "/../tours/../../../../model/user.php";
require_once __DIR__ . "/../tours/../../../../controller/user.controller.php";

// Start session if not happened
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$oUser = getUser();
if (!isset($iTourCounter)) {
    $iTourCounter = rand(0, 10000); // In case a tour was added and only this extract is rendered
}
if (!isset($sGroupHtmlId)) {
    $sGroupHtmlId = "tours-list-group_0";
}
if (!isset($oTour)) {
    $oTour = new tour($_POST["tourName"], $oUser->getSUsername());
    $oTour->setODate(new DateTime($_POST["tourDate"]));
}
$sTourHtmlId = $sGroupHtmlId . "-tour_${iTourCounter}";
$iTourCounter++;
?>

<div id="<?php echo $sTourHtmlId ?>" type="tours-list">
    <div class="tour-heading">
        <span class="expand-button" bh-expandable="<?php echo $sTourHtmlId ?>-bars">
            <?php echo $oTour->getSName(); ?>
        </span>
        <div class="tour-actions">
            <input type="hidden" name="tourId" value="<?php echo $oTour->getIId() ?>">
            <button class="button-add tour-actions-add" onclick="displayAddMarkerDialog(this, event);">
                <i class="">+</i>
            </button>
            <button class="button-edit" onclick="editTour($(this), event)">
                <i class="material-icons">edit</i>
            </button>
            <button class="button-delete" onclick="deleteTour(this, event)">
                <i class="material-icons">delete_forever</i>
            </button>
        </div>
    </div>
    <hr>
    <div id="<?php echo $sTourHtmlId ?>-bars" class="tour-bar_list">
        <?php
        $iMarkerCounter = 0;
        foreach ($oTour->getAMarkers() as $oMarker) {
            $sMarkerHtmlId = $sTourHtmlId . "-bars_" . $iMarkerCounter;
            $iMarkerCounter++;

            require __DIR__ . "/main_tours_marker.php";
            ?>
        <?php } ?>
    </div>
</div>
