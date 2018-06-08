<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mario Gierke
 * Date: 01.06.2018
 * Time: 10:20
 */

require_once __DIR__ . "/../controller/db.controller.php";
require_once __DIR__ . "/tour.php";

class user {

    private $_sUsername = null;
    private $_sMail = null;
    private $_sImage = null;
    private $_dJoinedSince = null;

    /**
     * user constructor.
     * @param $_sUsername
     */
    public function __construct($_sUsername = null) {
        $this->_sUsername = $_sUsername;

        $oConnection = DbController::instance();

        if (!empty($_sUsername)) {

            $aRow = $oConnection->query("
                SELECT email, profileImage, joinedSince
                FROM USER
                WHERE username = '$_sUsername'
            ")->fetch_array(MYSQLI_ASSOC);

            $this->_sMail = $aRow["email"];
            $this->_sImage = $aRow["profileImage"];
            $this->_dJoinedSince = $aRow["joinedSince"];
        }
    }

    // todo dummy data, please fill with real data
    /**
     * @return tour[]
     */
    public function getATours() {
        return array(
            new tour(new DateTime("2017-01-01")),
            new tour(new DateTime("2017-05-01")),
            new tour(new DateTime("2017-05-02")),
            new tour(new DateTime("2018-01-01")),
            new tour(new DateTime("2019-01-01")),
            new tour(new DateTime("2019-01-01")),
        );
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

    public function getSImage(): string {
        return $this->_sImage;
    }

    public function setSImage($sImage): void {
        $this->_sImage = $sImage;
    }

    public function getDJoinedSince(): string {
        return $this->_dJoinedSince;
    }

    public function setDJoinedSince($dJoinedSince): void {
        $this->_dJoinedSince = $dJoinedSince;
    }
}
