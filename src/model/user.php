<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mario Gierke
 * Date: 01.06.2018
 * Time: 10:20
 */

require_once __DIR__ . "/../controller/db.controller.php";
require_once "tour.php";

class user {

    private $_iId;
    private $_sUsername = null;
    private $_sMail = null;
    private $_sImage = null;
    private $_dJoinedSince = null;
    private $_aTours = null;

    /**
     * user constructor.
     * @param $_sUsername
     */
    public function __construct($_sUsername = null) {
        $this->_sUsername = $_sUsername;
        $oConnection = DbController::instance();

        if (!empty($_sUsername)) {

            $aData = $oConnection->query("
                SELECT id, email, profileImage, joinedSince
                FROM USER
                WHERE username = '$_sUsername'
            ")->fetch_array(MYSQLI_ASSOC);

            $this->_iId = $aData["id"];
            $this->_sMail = $aData["email"];
            $this->_sImage = $aData["profileImage"];
            $this->_dJoinedSince = $aData["joinedSince"];
        }
    }

    private function loadTours($iId) {
        $oConnection = DbController::instance();
        $aData = $oConnection->query("
                SELECT tour.id
                FROM USER user
                LEFT JOIN TOUR tour ON user.ID = tour.fk_userID
                WHERE user.id='$iId';
            ");

        $this->_aTours = array();
        foreach ($aData as $zeile) {
            $oTour = new tour($zeile['id']);
            $this->_aTours[] = $oTour;
        }
        //var_dump($this->_aTours);
    }

    /**
     * @return tour[]
     */
    public function getATours() {
        if ($this->_aTours === null) {
            $this->loadTours($this->getIId());
        }
        return $this->_aTours;
    }

    public function getSUsername(): string {
        return $this->_sUsername;
    }

    public function setSUsername($sUsername): void {
        $this->_sUsername = $sUsername;
    }

    public function getSMail(): string {
        return $this->_sMail;
    }

    public function setSMail($sMail): void {
        $this->_sMail = $sMail;
    }

    public function getSImage(): ?string {
        return $this->_sImage;
    }

    public function setSImage($sImage): void {
        $this->_sImage = $sImage;
    }

    public function getDJoinedSince(): ?string {
        return $this->_dJoinedSince;
    }

    public function setDJoinedSince($dJoinedSince): void {
        $this->_dJoinedSince = $dJoinedSince;
    }

    /**
     * @return mixed
     */
    public function getIId() {
        return $this->_iId;
    }

}
