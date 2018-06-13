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
    private $_iId = null;
    private $_iUserId = null;

    /**
     * @var DateTime
     */
    private $_oDate = null;
    private $_iRating = null;
    private $_sImagePath = null;
    private $_sComment = null;
    private $_aMarkers = null;
    private $_aMarkerDescriptions = array();

    public function __construct($iId) {
        $oConnection = DbController::instance();
        $aData = $oConnection->query("
                SELECT user.id, tour.name, tour.rating, tour.imagePath, tour.comment
                FROM USER USER
                LEFT JOIN TOUR tour ON user.id = tour.fk_userID
                WHERE tour.id = '$iId';
            ");

        $aRow = $aData->fetch_array(MYSQLI_ASSOC);

        $this->_sName = $aRow['name'];
        $this->_iId = $iId;
        $this->_iUserId = $aRow['id'];
        $this->_iRating = $aRow['rating'];
        $this->_sImagePath = $aRow['imagePath'];
        $this->_sComment = $aRow['comment'];
        $this->getAMarkers();
        $this->fillMarkerDescArray();
    }

    // Da die Marker einer Tour individuelle Beschreibungen,
    // werden die Berschreibungen hier den unabhängigen Markerobjekten zugeordnet.
    private function fillMarkerDescArray() {
        for ($iCount01 = 0; $iCount01 < sizeof($this->_aMarkers); $iCount01++) {
            $this->_aMarkerDescriptions[$iCount01][0] = $this->_aMarkers[0];
        }
    }

    public function getIId() {
        if ($this->_iId === null) {
            $this->_iId = rand(0, 1000);
        }
        return $this->_iId;
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

            // Hole alle Marker, die zu einer Tour gehören aus der Datenbank
            $aData = $oConnection->query("
                SELECT fk_markerID FROM tour2marker WHERE tour2marker.fk_tourID = '$this->_iId';
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
}
