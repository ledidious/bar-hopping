<?php

require_once __DIR__ . "/../model/marker.php";
require_once __DIR__ . "/../model/tour.php";
require_once __DIR__ . "/../controller/marker.controller.php";
require_once __DIR__ . "/../controller/db.controller.php";

// Start session
session_start();

// Db controller
$oController = DbController::instance();

switch ($_POST["action"]) {
    case "add":
        // Get tour
        $oTour = new tour($_POST["tourId"]);
        // Add and get marker object
        $oMarker = addMarker($oTour, null, null, $_POST["markerName"], null);
        // Set description for object ...
        $oTour->setMarkerDesc($oMarker->getIId(), $_POST["markerComment"]);
        // ... and in database
        $oController->execute("update TOUR2MARKER set description = '{$_POST["markerComment"]}' where fk_markerID = '{$oMarker->getIId()}'");
        // Render extract to return
        require __DIR__ . "/../view/html/main/tours/main_tours_marker.php";
        break;
    case "edit":
        $oMarker = new marker($_REQUEST["markerId"]);
        $oMarker->setSName($_REQUEST["markerName"]);
        editMarker($oMarker);
        break;
    case "delete":
        deleteMarker($_REQUEST["markerId"]);
        break;
}
