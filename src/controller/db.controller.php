<?php

require_once __DIR__ . "/../../conf/db.conf.php";

class DbController {

    private static $_INSTANCE = null;

    private $_sServerName = DB_SERVER_NAME;
    private $_sDbName = DB_NAME;
    private $_sUsername = DB_USERNAME;
    private $_sPassword = DB_PASSWORD;

    /**
     * @var mysqli
     */
    private $_oConnection;

    public function __construct() {
        $this->_connect();
    }

    private function _connect() {
        $this->_oConnection = new mysqli($this->_sServerName, $this->_sUsername, $this->_sPassword, $this->_sDbName);

        if ($this->_oConnection->connect_error) {
            die("Connection failed");
        }
    }

    public function execute($sSql) {
        if (!($stmt = $this->_oConnection->prepare($sSql))) { //Erzeuge mysql-Object und prüfe ob Syntax korrekt ist
            echo "Prepare failed: (" . $this->_oConnection->errno . ") " . $this->_oConnection->error;
        }

        if (!$stmt->execute()) { //Führe Query aus und geben bei Fehler Meldung zurück
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
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

    // Setters (only for testing purposes)
    // ====================================

    public function setSDbName($sDbName): void {
        $this->_sDbName = $sDbName;
        $this->_connect();
    }

    public function getOConnection(): mysqli {
        return $this->_oConnection;
    }

}
