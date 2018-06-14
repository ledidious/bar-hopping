<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 06.06.2018
 * Time: 16:16
 */
require_once(__DIR__ . '/../model/tour.php');
require_once(__DIR__ . '/../controller/db.controller.php');

/**
 * Add a new tour.
 *
 * @param string $sTourName the tour name
 * @param string $sTourDate the planned tour date
 * @return tour the new tour object with a database id
 */
function addTour($sTourName, $sTourDate) {
    // Dummy anlegen
    return new tour(null, $sTourName, $sTourDate);
}

/**
 * Edit properties of $oTour.
 *
 * @param tour $oTour the tour to update
 */
function editTour($oTour) {
    $oConnection = DbController::instance();
    $oConnection->execute("
        UPDATE TOUR
        SET TOUR.name = '{$oTour->getSName()}', TOUR.imagePath='{$oTour->getSImagePath()}', TOUR.comment='{$oTour->getSComment()}'
        WHERE TOUR.id = {$oTour->getIId()};
    ");
}

/**
 * Delete the tour associated to the $iTId.
 *
 * @param integer $iTId tour id
 */
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
