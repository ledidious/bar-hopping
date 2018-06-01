<?php

// Datei einfach kopieren, um Test für andere PHP-Datei anzulegen

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../controller/user.controller.php";

final class UserTest extends TestCase {

    public function testAddUser() {
        addUser("username", "password", "email", "2018-07-01");

        // Datenbankabfrage ob Benutzer existiert. Am besten gucken, wie das in user.controlller.php gemacht wurde.

        // $this->assertEquals(<expected>, <actual>);
    }

    public function testAddUser_usernameNotSet() {
        // Die gleiche Funktion aufrufen, nur Nutzernamen als null setzen
    }

    public function testLoginUser() {
        // Login mit userLogin() testen
    }

    // Weitere Tests ...
}
