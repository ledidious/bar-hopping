<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 08.06.2018
 * Time: 11:24
 */

class marker {
    private static $_aMarkers = array(); //Füge jeden Marker in diesem Array hinzu. Prüfe vor erstellen von neuen Markerobjekten ob bereits in der Liste

    private $_sId = null;
    private $_dLatitude = null;
    private $_dLongitude = null;
    private $_sName = null;

    public function __construct($sName) {
        $this->_sName = $sName;
    }

    public function getSId() {
        if ($this->_sId === null) {
            $this->_sId = rand(0, 1000);
        }
        return $this->_sId;
    }

    public static function selectForTour($oTour) {
        $oConnection = DbController::instance();
        $mysqi_result = $oConnection->query();

        foreach ($mysqi_result as $marker) {
            if (array_key_exists($marker->getId(), self::$_aMarkers)) {

            } else {
                new marker();
            }
        }
    }
}
