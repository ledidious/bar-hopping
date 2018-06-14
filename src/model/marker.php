<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 08.06.2018
 * Time: 11:24
 */

/**
 * Class marker
 */
class marker {

    /*
     * Static fields
     */
    private static $_aMarkers = array(); //Füge jeden Marker in diesem Array hinzu. Prüfe vor erstellen von neuen Markerobjekten ob bereits in der Liste

    /*
     * Local fields
     */
    private $_iId = null;
    private $_dLatitude = null;
    private $_dLongitude = null;
    private $_sName = null;

    /**
     * @return null
     */
    public function getDLatitude() {
        return $this->_dLatitude;
    }

    /**
     * @return null
     */
    public function getDLongitude() {
        return $this->_dLongitude;
    }

    /**
     * @return null
     */
    public function getSName() {
        return $this->_sName;
    }

    /**
     * @param null $sName
     */
    public function setSName($sName): void {
        $this->_sName = $sName;
    }

    /**
     * marker constructor.
     * @param $iId
     */
    public function __construct($iId) {

        if (!self::isMarkerLoaded($iId)) {
            $this->_iId = $iId;
            $oConnection = DbController::instance();
            $aData = $oConnection->query("SELECT name, lat, lng FROM MARKER WHERE id = '$this->_iId';");
            $aRow = $aData->fetch_array(MYSQLI_ASSOC);

            $this->_sName = $aRow['name'];
            $this->_dLatitude = $aRow['lat'];
            $this->_dLongitude = $aRow['lng'];
            // Füge den neuen Marker der Liste der existierender Marker hinzu.

            array_push(self::$_aMarkers, $this);
        }
    }

    // Gibt die ID des Markers zurück oder erzeugt eine, falls noch nicht vorhanden.
    public function getIId() {
        if ($this->_iId === null) {
            $this->_iId = rand(0, 1000);
        }
        return $this->_iId;
    }

    /**
     * Checks if the marker with $iId already was loaded because
     * it was cached before.
     *
     * @param integer $iId the id of the marker
     * @return bool
     */
    private static function isMarkerLoaded($iId): bool {
        if (array_key_exists($iId, self::$_aMarkers)) {
            return true;
        }
        return false;
    }
}
