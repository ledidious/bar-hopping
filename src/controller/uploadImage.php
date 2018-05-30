<?php
/**
 * Created by IntelliJ IDEA.
 * User: antex
 * Date: 5/2/18
 * Time: 9:37 PM
 */

$msg = 'Error';

$date = new DateTime();

$file_info = pathinfo($_FILES['pic']['name']);
// generate unique file name | today + random number(1000 - 100000) + file extension
$file_name = $date->format('dmYhms'). rand(10000, 999999) . '.' .$file_info['extension'];

//TODO save $file_name in database

// construct file path
$target = "../../images/" . basename($file_name);

// save file
if(move_uploaded_file($_FILES['pic']['tmp_name'], $target))
    $msg = "Success";
else
    $msg = "Can't upload image. Server Error";

echo $msg;
