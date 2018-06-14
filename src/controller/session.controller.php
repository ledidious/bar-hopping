<?php

/**
 * Flag to remind if current page enforces a session or not.
 * If yes, the user is redirected to the login page.
 */
global $blForceSession;
// Per default true
$blForceSession = true;

/**
 * Free from session need.
 */
function allowWithoutSession() {
    global $blForceSession;
    $blForceSession = false;
}

/**
 * Querying method asking whether the current page needs a session.
 *
 * @return bool
 */
function isSessionNeeded() {
    global $blForceSession;
    return $blForceSession;
}
