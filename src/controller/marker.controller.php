<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 13.06.2018
 * Time: 21:50
 */

require_once(__DIR__ . '/../model/marker.php');
require_once(__DIR__ . '/../controller/db.controller.php');

function addMarker($oTour, $dLat, $dLng, $sMName, $SImagePath){
    $oConnection = DbController::instance();
    $oConnection->execute("INSERT INTO marker(lat, lng, name) VALUES ('$dLat', '$dLng', '$sMName');");
    $sId = mysqli_insert_id($oConnection->getOConnection()); // ID des letzten Insert
    $oConnection->execute("INSERT INTO tour2marker(fk_tourID, fk_markerID, description, imagePath) VALUES ('$oTour->getIId()', '$sId', '$oTour->getMarkerDesc($sId)', '$SImagePath');");
}

function editMarker($oMarker){
    $oConnection = DbController::instance();
    $oConnection->execute("
        UPDATE TOUR2MARKER
        SET TOUR2MARKER.name = '{$oMarker->getSName()}', TOUR2MARKER.lat='{$oMarker->getDLatitude()}', TOUR2MARKER.description='{$oMarker->getDLongitude()}'
        WHERE MARKER.id = '$oMarker->getIId()';
    ");
}

function deleteMarker($iMId){
    $oConnection = DbController::instance();
    $oConnection->execute("
        DELETE FROM marker
        WHERE marker.id = '$iMId';
    ");
}
