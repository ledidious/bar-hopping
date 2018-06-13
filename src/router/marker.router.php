<?php

require_once __DIR__ . "/../model/marker.php";
require_once __DIR__ . "/../controller/marker.controller.php";

switch ($_POST["action"]) {
    case "add":
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
