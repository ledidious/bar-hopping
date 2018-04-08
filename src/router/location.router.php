<?php
/**
 * This function will deal with the request method and call the right controller function for the method like:
 * POST => addAction()
 * DELETE => deleteAction()
 */

require('../controller/location.controller.php');

$reqMethod = $_SERVER['REQUEST_METHOD'];

if($reqMethod === 'GET') {
    // call action function to return data like one bar
} elseif($reqMethod === 'POST') {
    // call action function to add new data 
} elseif($reqMethod === 'PUT') {
    // call action function to change existing data
} elseif($reqMethod === 'DELETE') {
    // call action function to delete existing data
}