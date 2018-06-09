<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 06.06.2018
 * Time: 16:16
 */
require_once('../controller/user.tour.php');
require_once('../controller/header.controller.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    dosth();
}
