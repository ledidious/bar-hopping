<?php

require_once __DIR__ . "/AbstractDbTest.php";
require_once __DIR__ . "/../controller/user.controller.php";
require_once __DIR__ . "/../controller/db.controller.php";

class UserTest extends AbstractDbTest {

    // Fertiger test
    public function testAddUser() {
        addUser("Hans", "password", "email", "2018-07-01", "m", "2018-01-01", "avatar.png");

        $oController = DbController::instance();
        $oMysqliResult = $oController->query("select * from USER where username = 'Hans'");
        $aRow = $oMysqliResult->fetch_array(MYSQLI_ASSOC);

        $this->assertEquals("Hans", $aRow["username"]);
    }

    public function testAddUser_usernameNotSet() {
        // Die gleiche Funktion aufrufen, nur Nutzernamen als null setzen
    }

    public function testLoginUser() {
        // Login mit userLogin() testen
    }
}
