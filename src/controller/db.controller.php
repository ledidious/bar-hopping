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

    public function execute($sSql){
        //$mysqli_stmt = $this->_oConnection->prepare($sSql); //Erzeuge mysql-Object
        $mysqli_stmt = $this->_oConnection->prepare("SELECT District FROM City WHERE Name=?");
        if ($mysqli_stmt === true)
            $mysqli_stmt->execute(); //Ausführen von query des objects auf DB
        else
            echo 'Fehler im Query! Statement lautet: '.$sSql;
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

//var_dump(DbController::instance()->query("select * from TOUR"));
