<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 15.05.2018
 * Time: 14:23
 */
require_once('db.controller.php');

function addUser($user, $pw, $email, $joinedSince, $sex = NULL, $yearOfBirth = NULL, $profImg = NULL)
{
    $connection = DbController::instance();
    //$result = $connection->query("SELECT username FROM user;");
    /*if ($result.mysqli_fetch_field() === $user)*/
    //echo $result.mysqli_fetch_field();
    //echo 'username: '.$user.' passwort: '.$pw.' E-Mail: '.$email.' Dabei seit: '.$joinedSince.' Geschlecht: '.$sex;
    if ($sex === NULL)
        $sex = 'NULL';

    if ($yearOfBirth === NULL)
        $yearOfBirth = 'NULL';

    if ($profImg === NULL)
        $profImg = 'NULL';

    $connection->execute("INSERT INTO user (username, password, email, joinedSince, sex, yearOfBirth, profileImage) VALUES ('$user', '$pw', '$email', '$joinedSince', '$sex', '$yearOfBirth', '$profImg');");
}



