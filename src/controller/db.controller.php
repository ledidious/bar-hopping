<?php

require_once __DIR__ . "/../../conf/db.conf.php";

class DbController {

    private static $_INSTANCE = null;

    private $_sServerName = DB_SERVER_NAME;
    private $_sDbName = DB_NAME;
    private $_sUsername = DB_USERNAME;
    private $_sPassword = DB_PASSWORD;

    private $_oConnection;

    public function __construct() {
        $this->_oConnection = new mysqli($this->_sServerName, $this->_sUsername, $this->_sPassword, $this->_sDbName);

        if ($this->_oConnection->connect_error) {
            die("Connection failed");
        }
    }

    public static function instance() {

        if (self::$_INSTANCE == null) {
            self::$_INSTANCE = new DbController();
        }

        return self::$_INSTANCE;
    }

    public function query($sSql) {
        return $this->_oConnection->query($sSql);
    }
}

var_dump(DbController::instance()->query("select * from TOUR"));
