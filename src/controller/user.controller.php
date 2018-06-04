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

function addUser($user, $pw, $email, $sex = NULL, $yearOfBirth = NULL, $profImg = NULL, $name) {
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

    $pw = password_hash($pw, PASSWORD_DEFAULT);
    $joinedSince = date("Y-m-d");

    if (!($connection->query("SELECT username FROM USER WHERE username='$user'")->fetch_array(MYSQLI_ASSOC))) { //Prüfen ob username beretis vorhanden
        $connection->execute("INSERT INTO USER (username, password, email, joinedSince, sex, yearOfBirth, profileImage) VALUES ('$user', '$pw', '$email', '$joinedSince', '$sex', '$yearOfBirth', '$profImg')");
        sendHeader("refresh:3;url=../view/html/login.php");
    } else {
        echo 'Username bereits vorhanden!';
        sendHeader("refresh:3;url=../view/html/register.php");
    }
}

function loginUser($username, $pw) {
    $connection = DbController::instance();

    if (password_verify($pw, ((($connection->query("SELECT password FROM USER WHERE username='$username'"))->fetch_array(MYSQLI_ASSOC))['password']))) {
        echo 'Login erfolgreich!';
        session_start();
        $_SESSION[SESSION_USERNAME] = $username;
        sendHeader("refresh:3;url=../view/html/main.php");
    } else {
        echo 'Passwort ist falsch!';
        sendHeader("refresh:3;url=../view/html/login.php");
    }
    /*
     $result = $connection->query("SELECT password FROM user WHERE username='$user'");
     $row = $result->fetch_array(MYSQLI_ASSOC);

     if (password_verify($pw, $row['password'])) {
         echo 'Valides Passwort!';
     } else {
         echo 'Invalides Passwort!';
     }*/
}

function changePassword($user, $pw) {
    $connection = DbController::instance();

    $pw = password_hash($pw, PASSWORD_DEFAULT);

    if (($connection->query("SELECT username FROM USER WHERE username='$user'")->fetch_array(MYSQLI_ASSOC))) //Prüfen ob username beretis vorhanden
        $connection->execute("UPDATE USER SET password = '$pw' WHERE username = '$user'");
    else
        echo 'Username nicht vorhanden!';
}

/**
 * Returns the current logged in user or null if
 * none is logged in. Be careful!
 *
 * @return null|user
 */
function getUser() {

    // When not happened until now, start session here
    session_start();

    // Caching
    static $oUser = null;

    if ($oUser !== null) {
        return $oUser;
    }

    $sUserName = $_SESSION[SESSION_USERNAME];

    if (empty($sUserName)) {
        return null;
    }

    return new user($sUserName);
}
