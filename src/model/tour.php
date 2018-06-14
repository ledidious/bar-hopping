<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jannis
 * Date: 06.06.2018
 * Time: 16:04
 */

require_once __DIR__ . "/marker.php";
require_once __DIR__ . "/../controller/user.controller.php";

/**
 * Class tour
 */
class tour {

    /*
     * Local fiels
     */
    private $_sName = null;
    private $_iId = null;
    private $_iUserId = null;
    /** @var DateTime */
    private $_oDate = null;
    private $_iRating = null;
    private $_sImagePath = null;
    private $_sComment = null;
    private $_aMarkers = null;
    private $_aMarkerDescriptions = array();
    private $_aMarkerImage = array();

    /**
     * tour constructor.
     * @param integer $iId the id to load
     * @param string $sName the name to forgive
     * @param string $sTourDate the date to set
     */
    public function __construct($iId = null, $sName = null, $sTourDate = null) {
        $oConnection = DbController::instance();
        if ($iId !== null) {
            $aData = $oConnection->query("
                SELECT user.id, tour.name, tour.rating, tour.imagePath, tour.comment, tour.tourDate
                FROM USER user
                LEFT JOIN TOUR tour ON user.id = tour.fk_userID
                WHERE tour.id = '$iId';
            ");

            $aRow = $aData->fetch_array(MYSQLI_ASSOC);

            $this->_oDate = new DateTime($aRow["tourDate"]);
            $this->_sName = $aRow['name'];
            $this->_iId = $iId;
            $this->_iUserId = $aRow['id'];
            $this->_iRating = $aRow['rating'];
            $this->_sImagePath = $aRow['imagePath'];
            $this->_sComment = $aRow['comment'];
            $this->getAMarkers();
            $this->fillMarkerDescArray();
        } else {
            $iUid = getUser()->getIId();
            $oConnection->execute("INSERT INTO TOUR(fk_userID, name, tourDate) VALUES ('$iUid', '$sName', '$sTourDate');");

            if ($sName !== null) $this->_sName = $sName;
            if ($sTourDate !== null) $this->_oDate = new DateTime($sTourDate);
        }
    }

    // Da die Marker einer Tour individuelle Beschreibungen,
    // werden die Berschreibungen hier den unabhängigen Markerobjekten zugeordnet.
    /**
     * Because the marker have individual descriptions dependent of the associated tour
     * (at least planned ;-)), they are not stored in {@link marker}
     * but in this class and can be accessed using {@link #getMarkerDesc()).
     */
    private function fillMarkerDescArray() {
        $oController = DbController::instance();

        foreach ($this->getAMarkers() as $oMarker) {
            $aRow = $oMysqliResult = $oController->query("
                select description 
                from TOUR2MARKER 
                where fk_markerID = '{$oMarker->getIId()}'
            ")->fetch_array(MYSQLI_ASSOC);

            $this->_aMarkerDescriptions[$oMarker->getIId()] = $aRow["description"];
        }
    }

    /**
     * Get description of marker with id $iMId.
     *
     * @param integer $iMId the id of the marker
     * @return string
     */
    public function getMarkerDesc($iMId) {
        return $this->_aMarkerDescriptions[$iMId];
    }

    /**
     * Set the description of the marker with the id $iMId.
     *
     * @param integer $iMId
     * @param string $sDescription
     */
    public function setMarkerDesc($iMId, $sDescription) {
        $this->_aMarkerDescriptions[$iMId] = $sDescription;
    }

    /**
     * Returns the id of this tour or generated a new one.
     *
     * @return string
     */
    public function getIId(): ?string {
        if ($this->_iId === null) {
            $this->_iId = rand(0, 10000);
        }
        return $this->_iId;
    }

    /**
     * Sets the date.
     *
     * @param DateTime $oDateTime not null
     */
    public function setODate(DateTime $oDateTime) {
        $this->_oDate = $oDateTime;
    }

    /**
     * Returns the date, not null.
     * @return DateTime
     */
    public function getODate(): DateTime {
        return $this->_oDate ?: $this->_oDate = new DateTime();
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
     * @return marker[]
     */
    public function getAMarkers() {

        if ($this->_aMarkers === null) {
            $oConnection = DbController::instance();

            // Hole alle Marker, die zu einer Tour gehören aus der Datenbank
            $aData = $oConnection->query("
                SELECT fk_markerID FROM TOUR2MARKER WHERE TOUR2MARKER.fk_tourID = '$this->_iId';
            ");

            //var_dump($aData);

            // Die Daten der Abfrage dem Markerobjekten übergeben. Für jeden Eintrag wird ein neuer Marker erzeugt.
            $this->_aMarkers = array();
            foreach ($aData as $aMarkerData) {
                //var_dump($aMarkerData);
                $this->_aMarkers[] = new marker($aMarkerData['fk_markerID']);
            }
        }

        return $this->_aMarkers;
    }

    /**
     * @return null
     */
    public function getIRating() {
        return $this->_iRating;
    }

    /**
     * @return null
     */
    public function getSImagePath() {
        return $this->_sImagePath;
    }

    /**
     * @return null
     */
    public function getSComment() {
        return $this->_sComment;
    }
}
