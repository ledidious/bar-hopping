<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mario Gierke
 * Date: 15.05.2018
 * Time: 14:22
 */

require_once('db.controller.php');


    function addUser($user, $pw, $email, $joinedSince, $sex=null, $yearOfBirth=null, $profImg=null){
        $connection = DbController::instance();
        $text = $connection->query("INSERT INTO USER (username, password, email, joinedSince, sex, yearOfBirth, profileImage) VALUES ($user, $pw, $email, $joinedSince, $sex, $yearOfBirth, $profImg)");
}



?>
