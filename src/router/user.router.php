<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 16.05.2018
 * Time: 14:47
 */
require_once('../controller/user.controller.php');

//var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST')
    if (basename($_SERVER['HTTP_REFERER']) == 'register.php')
        addUser($_POST["username"], $_POST["password"], $_POST["mail"], '2014-03-02', 'Male', '2003-02-07', 'C:/notPorn/sexy_heidi.png');
    else if (basename($_SERVER['HTTP_REFERER']) == 'login.php')
        loginUser($_POST["username"], $_POST["password"]);
    else if (basename($_SERVER['HTTP_REFERER']) == 'reset_password.php'){
        changePassword($_POST["username"], $_POST["password"]); header("refresh:3;url=../view/html/login.php");}
    else if (basename($_SERVER['HTTP_REFERER']) == 'main.php'){
        if ($_POST["password"] === $_POST["password_repeat"])
            changePassword($_POST["username"], $_POST["password"]); header("refresh:3;url=../view/html/main.php");
    }
