<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 06.06.2018
 * Time: 16:16
 */
require_once "tour.php";

function addTour($sTourName, $sTourDate) {
    // Dummy anlegen
    $oTour = new tour(null, $sTourName, $sTourDate);
}

function editTour($oTour){
    $oConnection = DbController::instance();
    $oConnection->execute("
        UPDATE tour
        SET tour.name = '$oTour->getSName()', tour.imagePath='$oTour->getSImagePath()', tour.`comment`='$oTour->getSComment()', tour.rating = '$oTour->getIRating()', tour.tourDate = '$oTour->getODate()'
        WHERE tour.id = '$oTour->getIId()';
    ");
}

function deleteTour($iTId){
    $oConnection = DbController::instance();
    $oConnection->execute("
        DELETE FROM tour
        WHERE tour.id = '$iTId';
    ");
}
