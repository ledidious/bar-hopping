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

// Start session
session_start();

switch ($_POST["action"]) {
    case "add":
        $oTour = addTour($_POST["tourName"], $_POST["tourDate"]);
        require __DIR__ . "/../view/html/main/tours/main_tours_tour.php";
        break;
    case "edit":
        $oTour = new tour($_POST["tourId"]);
        $oTour->setSName($_POST["tourName"]);
        editTour($oTour);
        break;
    case "delete":
        deleteTour($_POST["tourId"]);
        break;
}
