<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 15.05.2018
 * Time: 14:23
 */
require_once('db.controller.php');
require_once('../model/user.php');

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

    $pw = password_hash($pw, PASSWORD_DEFAULT);
    $joinedSince = date("Y-m-d");

    if (!($connection->query("SELECT username FROM user WHERE username='$user'")->fetch_array(MYSQLI_ASSOC))) { //Prüfen ob username beretis vorhanden
        $connection->execute("INSERT INTO user (username, password, email, joinedSince, sex, yearOfBirth, profileImage) VALUES ('$user', '$pw', '$email', '$joinedSince', '$sex', '$yearOfBirth', '$profImg')");
        header("refresh:3;url=../view/html/login.php");
    } else {
        echo 'Username bereits vorhanden!';
        header("refresh:3;url=../view/html/register.php");
    }
}

function loginUser($user, $pw)
{
    $connection = DbController::instance();

    if (password_verify($pw, ((($connection->query("SELECT password FROM user WHERE username='$user'"))->fetch_array(MYSQLI_ASSOC))['password']))) {
        echo 'Login erfolgreich!';
        session_start();
        $_SESSION["userObject"] = new user($user);
        header("refresh:3;url=../view/html/main.php");
    } else {
        echo 'Passwort ist falsch!';
        header("refresh:3;url=../view/html/login.php");
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

function changePassword($user, $pw)
{

    $connection = DbController::instance();

    $pw = password_hash($pw, PASSWORD_DEFAULT);

    if (($connection->query("SELECT username FROM user WHERE username='$user'")->fetch_array(MYSQLI_ASSOC))) //Prüfen ob username beretis vorhanden
        $connection->execute("UPDATE user SET password = '$pw' WHERE username = '$user'");
    else
        echo 'Username nicht vorhanden!';
}



