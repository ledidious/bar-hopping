<?php

require_once __DIR__ . "/../../conf/db.conf.php";

/**
 * Controller that manages the single database connection.
 */
class DbController {

    /**
     * Singleton pattern of this class.
     *
     * @var DbController
     */
    private static $_INSTANCE = null;

    /**
     * The server name
     * @var string
     */
    private $_sServerName = DB_SERVER_NAME;

    /**
     * The schema name.
     * @var string
     */
    private $_sDbName = DB_NAME;

    /**
     * The database user needed to access information from the database.
     * @var string
     */
    private $_sUsername = DB_USERNAME;

    /**
     * The database user password.
     *
     * @var string
     */
    private $_sPassword = DB_PASSWORD;

    /**
     * The connection object from library mysqli.
     *
     * @var mysqli
     */
    private $_oConnection;

    /**
     * DbController constructor.
     */
    public function __construct() {
        $this->_connect();
    }

    /**
     * Returns the singleton of this class.
     *
     * @return DbController
     */
    public static function instance() {
        if (self::$_INSTANCE == null) {
            self::$_INSTANCE = new DbController();
        }

        return self::$_INSTANCE;
    }

    /**
     * Opens the database connection.
     */
    private function _connect() {
        $this->_oConnection = new mysqli($this->_sServerName, $this->_sUsername, $this->_sPassword, $this->_sDbName);

        if ($this->_oConnection->connect_error) {
            die("Connection failed");
        }
    }

    /**
     * SQL manipulate statements, f.ex. insert, delete or update.
     * @param string $sSql
     */
    public function execute($sSql) {
        if (!($stmt = $this->_oConnection->prepare($sSql))) { //Erzeuge mysql-Object und prüfe ob Syntax korrekt ist
            echo "Prepare failed: (" . $this->_oConnection->errno . ") " . $this->_oConnection->error;
        }

        if (!$stmt->execute()) { //Führe Query aus und geben bei Fehler Meldung zurück
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
    }

    /**
     * SQL select statements. This function returns an object of {@link mysqli_result}, on which
     * further operations can be executed.
     *
     * @param string $sSql
     * @return bool|mysqli_result
     */
    public function query($sSql) {
        return $this->_oConnection->query($sSql);
    }

    // Setters (only for testing purposes)
    // ====================================

    /**
     * Manually set name of database that should be used.
     *
     * @param string $sDbName
     */
    public function setSDbName($sDbName): void {
        $this->_sDbName = $sDbName;
        $this->_connect();
    }

    /**
     * Return mysqli connection object.
     *
     * @return mysqli
     */
    public function getOConnection(): mysqli {
        return $this->_oConnection;
    }

}
