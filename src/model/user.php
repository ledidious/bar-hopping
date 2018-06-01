<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mario Gierke
 * Date: 01.06.2018
 * Time: 10:20
 */

class user
{
    private $_sUsername;
    private $_sName;
    private $_sMail;
    private $_sImage;
    private $_dJoinedSince;

    /**
     * user constructor.
     * @param $_sUsername
     */
    public function __construct($_sUsername)
    {
        $this->_sUsername = $_sUsername;
        $connection = DbController::instance();

        $this->_sName = ((($connection->query("SELECT name FROM user WHERE username='$_sUsername'"))->fetch_array(MYSQLI_ASSOC))['name']);
        $this->_sMail = ((($connection->query("SELECT email FROM user WHERE username='$_sUsername'"))->fetch_array(MYSQLI_ASSOC))['email']);
        $this->_sImage = ((($connection->query("SELECT profileImage FROM user WHERE username='$_sUsername'"))->fetch_array(MYSQLI_ASSOC))['profileImage']);
        $this->_dJoinedSince = ((($connection->query("SELECT joinedSince FROM user WHERE username='$_sUsername'"))->fetch_array(MYSQLI_ASSOC))['joinedSince']);
    }

    /**
     * @return mixed
     */
    public function getSUsername()
    {
        return $this->_sUsername;
    }

    /**
     * @param mixed $sUsername
     */
    public function setSUsername($sUsername): void
    {
        $this->_sUsername = $sUsername;
    }

    /**
     * @return mixed
     */
    public function getSName()
    {
        return $this->_sName;
    }

    /**
     * @param mixed $sName
     */
    public function setSName($sName): void
    {
        $this->_sName = $sName;
    }

    /**
     * @return mixed
     */
    public function getSMail()
    {
        return $this->_sMail;
    }

    /**
     * @param mixed $sMail
     */
    public function setSMail($sMail): void
    {
        $this->_sMail = $sMail;
    }

    /**
     * @return mixed
     */
    public function getSImage()
    {
        return $this->_sImage;
    }

    /**
     * @param mixed $sImage
     */
    public function setSImage($sImage): void
    {
        $this->_sImage = $sImage;
    }

    /**
     * @return mixed
     */
    public function getDJoinedSince()
    {
        return $this->_dJoinedSince;
    }

    /**
     * @param mixed $dJoinedSince
     */
    public function setDJoinedSince($dJoinedSince): void
    {
        $this->_dJoinedSince = $dJoinedSince;
    }
}




