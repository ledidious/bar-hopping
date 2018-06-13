<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 15.05.2018
 * Time: 14:23
 */
require_once('db.controller.php');
require_once(__DIR__ . '/../model/user.php');
require_once(__DIR__ . '/../common/session_vars.php');
require_once(__DIR__ . '/../controller/header.controller.php');

function addUser($user, $pw, $email, $name = null, $sex = NULL, $yearOfBirth = NULL, $profImg = NULL) {
    $connection = DbController::instance();
    //$result = $connection->query("SELECT username FROM user;");
    /*if ($result.mysqli_fetch_field() === $user)*/
    //echo $result.mysqli_fetch_field();
    //echo 'username: '.$user.' passwort: '.$pw.' E-Mail: '.$email.' Dabei seit: '.$joinedSince.' Geschlecht: '.$sex;
    if ($sex === NULL)
        $sex = 'neutral';

    if ($yearOfBirth === NULL)
        $yearOfBirth = '9999-12-30';

    if ($profImg === NULL)
        $profImg = 'img/avatars/avatar.png';

    if ($name === NULL)
        $user = '-';
    /* function to hash the password */
    $pw = password_hash($pw, PASSWORD_DEFAULT);

    /* function to get the current date */
    $joinedSince = date("Y-m-d");

    /* give back false, if user is already registered otherwise add the user */
    if (!($connection->query("SELECT username FROM USER WHERE username='$user'")->fetch_array(MYSQLI_ASSOC))) { //Prüfen ob username beretis vorhanden
        $connection->execute("INSERT INTO USER (username, password, email, joinedSince, sex, yearOfBirth, profileImage, name) VALUES ('$user', '$pw', '$email', '$joinedSince', '$sex', '$yearOfBirth', '$profImg', '$name')");
        sendHeader("refresh:3;url=../view/html/login.php");
    } else {
        echo 'Username bereits vorhanden!';
        sendHeader("refresh:3;url=../view/html/register.php");
    }
}

function loginUser($username, $pw) {
    $connection = DbController::instance();

    /* verify the password from database */
    if (password_verify($pw, ((($connection->query("SELECT password FROM USER WHERE username='$username'"))->fetch_array(MYSQLI_ASSOC))['password']))) {
        session_start();
        $_SESSION[SESSION_USERNAME] = $username;
        sendHeader("refresh:0;url=../view/html/main.php");
    } else {
        echo 'Passwort ist falsch!';
        sendHeader("refresh:3;url=../view/html/login.php");
    }

}

/* use for reset password*/
function changePassword($user, $pw) {
    $connection = DbController::instance();

    /* function to hash the password */
    $pw = password_hash($pw, PASSWORD_DEFAULT);

    /* if user is available set new password */
    if (($connection->query("SELECT username FROM USER WHERE username='$user'")->fetch_array(MYSQLI_ASSOC))) //Prüfen ob username beretis vorhanden
        $connection->execute("UPDATE USER SET password = '$pw' WHERE username = '$user'");
    else
        echo 'Username nicht vorhanden!';
}


function getUser() {

    // When not happened until now, start session here
    if (session_status() !== PHP_SESSION_ACTIVE) {
        return null;
    }

    // Caching
    static $oUser = null;
    static $sLastUserName = null;

    $sUserName = $_SESSION[SESSION_USERNAME];
    if ($oUser !== null && $sUserName === $sLastUserName) {
        return $oUser;
    }
    $sLastUserName = $sUserName;

    if (empty($sUserName)) {
        return null;
    }

    $oUser = new user($sUserName);
    return $oUser;
}
