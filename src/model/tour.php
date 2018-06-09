<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 06.06.2018
 * Time: 16:04
 */

class tour {
    private $_sName = null;
    private $_iUserId = null;
    private $_iRating = null;
    private $_sImagePath = null;
    private $_sComment = null;
    private $aMarkers = array();

    public function __construct($sTourname, $sUsername, $iRating = null, $sImagePath = null, $sComment = null) {
        $this->_sName = $sTourname;
        $this->_iUserId = $sUsername;
        $this->_iRating = $iRating;
        $this->_sImagePath = $sImagePath;
        $this->_sComment = $sComment;

        $this->loadMarkers();
    }

    private function loadMarkers() {
        $oConnection = DbController::instance();

        $aData = $oConnection->query("
                SELECT marker.name FROM tour2marker
                LEFT JOIN marker ON tour2marker.fk_markerID = marker.id
                WHERE fk_tourID = 1;
            ");

        echo var_dump($aData);
    }
}
