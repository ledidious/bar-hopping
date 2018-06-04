<?php

require_once __DIR__ . "/../controller/db.controller.php";

use PHPUnit\Framework\TestCase;

abstract class AbstractDbTest extends TestCase {

    public static function setUpBeforeClass() {

        global $blTestMode;
        $blTestMode = true;

        // Set name of database to test database
        // to execute tests on test database!
        $oController = DbController::instance();
        $oController->setSDbName("bar-hopping-test");

        // Begin transaction
        $oController->getOConnection()->begin_transaction();

        // Call parent
        parent::setUpBeforeClass();
    }

    public static function tearDownAfterClass() {

        // End transaction and rollback so revert changes of test made
        $oController = DbController::instance();
        $oController->getOConnection()->rollback();

        // Call parent
        parent::tearDownAfterClass();
    }
}
