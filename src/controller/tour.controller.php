<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 06.06.2018
 * Time: 16:16
 */
require_once(__DIR__ . '/../model/tour.php');
require_once(__DIR__ . '/../controller/db.controller.php');

function addTour($sTourName, $sTourDate) {
    // Dummy anlegen
    $oTour = new tour(null, $sTourName, $sTourDate);
}

/**
 * @param tour $oTour
 */
function editTour($oTour){
    $oConnection = DbController::instance();
    $oConnection->execute("
        UPDATE TOUR
        SET TOUR.name = '{$oTour->getSName()}', TOUR.imagePath='{$oTour->getSImagePath()}', TOUR.comment='{$oTour->getSComment()}'
        WHERE TOUR.id = {$oTour->getIId()};
    ");
}

function deleteTour($iTId) {
    $oConnection = DbController::instance();

    $oConnection->execute("
        DELETE FROM TOUR2MARKER
        WHERE fk_tourID = '$iTId';
    ");
    $oConnection->execute("
        DELETE FROM TOUR
        WHERE TOUR.id = '$iTId';
    ");
}
