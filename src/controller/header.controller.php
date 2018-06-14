<?php

// This implementation is necessary because header() throws
// an exception if output is sent before executing header(). This happens
// when executing the tests. Out of this reason, the test mode disables the use
// of header() by replacing all direct uses of header() with this function sendHeader().
//
// Issue see http://php.net/manual/en/function.header.php
//
global $blTestMode;
$blTestMode = false;

/**
 * Workaround to send a http header.
 *
 * @param string $sString
 * @param bool $blReplace
 * @param integer $iHttpResponseCode
 */
function sendHeader($sString, $blReplace = true, $iHttpResponseCode = null) {
    global $blTestMode;

    // Do not send header if test mode is active!
    if (!$blTestMode) {
        header($sString, $blReplace, $iHttpResponseCode);
    }
}
