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

    private $_sUsername = null;
    private $_sMail = null;
    private $_sImage = null;
    private $_dJoinedSince = null;
    private $_aTours = array();

    /**
     * user constructor.
     * @param $_sUsername
     */
    public function __construct($_sUsername = null) {
        $this->_sUsername = $_sUsername;

        $oConnection = DbController::instance();

        if (!empty($_sUsername)) {

            $aData = $oConnection->query("
                SELECT email, profileImage, joinedSince
                FROM USER
                WHERE username = '$_sUsername'
            ")->fetch_array(MYSQLI_ASSOC);

            $this->_sMail = $aData["email"];
            $this->_sImage = $aData["profileImage"];
            $this->_dJoinedSince = $aData["joinedSince"];

            $aData = $oConnection->query("
                SELECT tour.name, tour.rating, tour.imagePath, tour.comment FROM USER
                LEFT JOIN TOUR ON user.ID = tour.fk_userID
                WHERE username='hackerman';
            ");

            $iCounter = 0;
            foreach ($aData as $zeile) {
                $this->_aTours[$iCounter] = new tour($zeile['name'],$this->_sUsername,(int)$zeile['rating'],$zeile['imagePath'],$zeile['comment']);
                $iCounter++;
            }

            //echo var_dump($this->_aTours);
           /* for ($c = 0; $c < $_aRow->num_rows; $c++){
                echo var_dump($_aRow->fetch_array());
            }*/
        }
    }

    /**
     * @return tour[]
     */
    public function getATours() {
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
