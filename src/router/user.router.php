<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 16.05.2018
 * Time: 14:47
 */
require_once('../controller/user.controller.php');
require_once('../controller/header.controller.php');

// Start session
session_start();

//var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (basename($_SERVER['HTTP_REFERER']) == 'register.php')
        addUser($_POST["username"], $_POST["password"], $_POST["mail"], $_POST["name"],NULL, NULL, NULL);
    else if (basename($_SERVER['HTTP_REFERER']) == 'login.php')
        loginUser($_POST["username"], $_POST["password"]);
    else if (basename($_SERVER['HTTP_REFERER']) == 'reset_password.php') {
        changePassword($_POST["username"], $_POST["password"]);
        sendHeader("refresh:3;url=../view/html/login.php");
    } else if (basename($_SERVER['HTTP_REFERER']) == 'main.php') {
        if ($_POST["password"] === $_POST["password_repeat"]) {
            changePassword($_POST["username"], $_POST["password"]);
            sendHeader("refresh:3;url=../view/html/main.php");
        }
    }
}
