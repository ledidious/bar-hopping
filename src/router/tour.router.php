<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 06.06.2018
 * Time: 16:16
 */
require_once('../controller/header.controller.php');
require_once('../model/tour.php');
require_once(__DIR__ . "/../controller/tour.controller.php");

switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        require __DIR__ . "/../view/html/main/tours/main_tours_tour.php";
        break;
    case "PATCH":
        $oTour = new tour($_REQUEST["tourId"]);
        $oTour->setSName($_REQUEST["tourName"]);
        editTour($oTour);
        break;
    case "DELETE":
        deleteTour($_REQUEST["tourId"]);
        break;
}
