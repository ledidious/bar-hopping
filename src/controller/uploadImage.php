<?php
/**
 * Created by IntelliJ IDEA.
 * User: antex
 * Date: 5/2/18
 * Time: 9:37 PM
 */

$msg = "ERROR";

// get image type (.png, .jpg, ...)
$image_type = explode(".", $_FILES['pic']['name']);
$date = new DateTime();
$target = "../../images/" . basename($date->format('dmYhms'). rand(1000, 10000) . '.' .$image_type[1]);

//TODO save file name in database

if(move_uploaded_file($_FILES['pic']['tmp_name'], $target)) {
    $msg = "success";
} else {
    $msg = "ERROR";
}

echo $msg;
