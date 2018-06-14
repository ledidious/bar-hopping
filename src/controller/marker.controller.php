<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 13.06.2018
 * Time: 21:50
 */

require_once(__DIR__ . '/../model/marker.php');
require_once(__DIR__ . '/../controller/db.controller.php');

/**
 * Add marker to an associated $oTour.
 *
 * @param tour $oTour
 * @return marker the new generated marker object with a new generated database id
 */
function addMarker($oTour, $dLat, $dLng, $sMName, $SImagePath) {
    $oConnection = DbController::instance();
    $oConnection->execute("INSERT INTO MARKER(lat, lng, name) VALUES ('$dLat', '$dLng', '$sMName');");
    $sId = mysqli_insert_id($oConnection->getOConnection()); // ID des letzten Insert
    $oConnection->execute("INSERT INTO TOUR2MARKER(fk_tourID, fk_markerID, description, imagePath) VALUES ('{$oTour->getIId()}', '$sId', '{$oTour->getMarkerDesc($sId)}', '{$SImagePath}');");

    return new marker($sId);
}

/**
 * Update properties of marker object.
 *
 * @param marker $oMarker to update
 */
function editMarker($oMarker) {
    $oConnection = DbController::instance();

    $oConnection->execute("
        update MARKER
        set name = '{$oMarker->getSName()}', lat = '{$oMarker->getDLatitude()}', lng = '{$oMarker->getDLongitude()}'
        where id = '{$oMarker->getIId()}'
    ");
}

/**
 * Delete marker from database.
 *
 * @param integer $iMId id of marker object to delete
 */
function deleteMarker($iMId) {
    $oConnection = DbController::instance();
    $oConnection->execute("
        delete from TOUR2MARKER where fk_markerID = '$iMId';
    ");
    $oConnection->execute("
        DELETE FROM MARKER
        WHERE MARKER.id = '$iMId';
    ");
}
