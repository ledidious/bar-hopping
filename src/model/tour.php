<?php

require_once __DIR__ . "/marker.php";

// todo dummy class, please implement with real data
class tour {

    /**
     * @var DateTime
     */
    private $_oDate = null;

    private $_sId = null;

    public function __construct($oDate) {
        $this->_oDate = $oDate;
    }

    public function getSId() {
        if ($this->_sId === null) {
            $this->_sId = rand(0, 1000);
        }
        return $this->_sId;
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
        return array(
            new marker(),
            new marker(),
            new marker(),
            new marker(),
        );
    }
}
