<?php

require_once __DIR__ . "/AbstractDbTest.php";
require_once __DIR__ . "/../controller/user.controller.php";
require_once __DIR__ . "/../controller/db.controller.php";
require_once __DIR__ . "/../common/session_vars.php";


class UserTest extends AbstractDbTest {

    // Fertiger test
    public function testAddUser() {
        addUser("Hans", "password", "email", "avatar.png", "2018-07-01", "m", "2018-01-01");

        $oController = DbController::instance();
        $oMysqliResult = $oController->query("select * from USER where username = 'Hans'");
        $aRow = $oMysqliResult->fetch_array(MYSQLI_ASSOC);

        $this->assertEquals("Hans", $aRow["username"]);
    }

    public function testAddUser_existing() {
        $oController = DbController::instance();
        $oController->execute("insert into USER (username) value ('Hans')");

        addUser("Hans", "Werner", "Hans.Werner@gmail.com", "2018-01-01");

        $oResultSet = $oController->query("select username from USER where username = 'Hans'");
        $this->assertEquals(1, $oResultSet->num_rows, "Found two users with username 'Hans'");
    }

    public function testGetUser() {
        $_SESSION[SESSION_USERNAME] = "hackerman";

        $oUser = getUser();
        $this->assertNotNull($oUser);
        $this->assertEquals($oUser->getSUsername(), "hackerman");
    }

    public function testGetUser_noSessionId() {
        $_SESSION[SESSION_USERNAME] = "";

        $oUser = getUser();
        $this->assertNull($oUser);
    }

    public function testGetUser_caching() {
        $_SESSION[SESSION_USERNAME] = "hackerman";

        $oFirstUser = getUser();
        $oSecondUser = getUser();
        $this->assertTrue($oFirstUser === $oSecondUser, "Not reference equal although caching");
    }

    public function testChangePassword() {
        changePassword("hackerman", "lalala");

        $oController = DbController::instance();
        $oMysqliResult = $oController->query("select password from USER where username = 'hackerman'");
        $aRow = $oMysqliResult->fetch_array(MYSQLI_ASSOC);

        $this->assertTrue(password_verify("lalala", $aRow["password"]));
    }

    public function testChangePassword_userNotExisting() {
        changePassword("hackerwoman", "lalala");

        $oController = DbController::instance();
        $oMysqliResult = $oController->query("select password from USER where username = 'hackerman'");
        $aRow = $oMysqliResult->fetch_array(MYSQLI_ASSOC);

        $this->assertFalse(password_verify("lalala", $aRow["password"]));
    }
}
