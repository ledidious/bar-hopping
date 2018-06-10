<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 06.06.2018
 * Time: 16:04
 */

require_once __DIR__ . "/marker.php";

class tour {
    private $_sName = null;
    private $_sId = null;
    private $_iUserId = null;

    /**
     * @var DateTime
     */
    private $_oDate = null;
    private $_iRating = null;
    private $_sImagePath = null;
    private $_sComment = null;
    private $_aMarkers = array();

    public function __construct($sTourname, $sUsername, $iRating = null, $sImagePath = null, $sComment = null) {
        $this->_sName = $sTourname;
        $this->_iUserId = $sUsername;
        $this->_iRating = $iRating;
        $this->_sImagePath = $sImagePath;
        $this->_sComment = $sComment;
    }

    public function getSId() {
        if ($this->_sId === null) {
            $this->_sId = rand(0, 1000);
        }
        return $this->_sId;
    }

    public function setODate(DateTime $oDateTime) {
        $this->_oDate = $oDateTime;
    }

    /**
     * @return DateTime
     */
    public function getODate(): DateTime {
        return $this->_oDate;
    }

    /**
     * @return marker[]
     */
    public function getAMarkers() {

        if ($this->_aMarkers === null) {
            $oConnection = DbController::instance();

            $aData = $oConnection->query("
                SELECT marker.name FROM TOUR2MARKER tour2marker
                LEFT JOIN MARKER marker ON tour2marker.fk_markerID = marker.id
                WHERE fk_tourID = 1;
            ");

            $this->_aMarkers = array();
            foreach ($aData as $aMarkerData) {
                $this->_aMarkers[] = new marker("Kneipe XYZ");
            }
        }

        return $this->_aMarkers;
    }
}
