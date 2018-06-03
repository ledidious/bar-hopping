<?php

global $blForceSession;
$blForceSession = true;

function allowWithoutSession() {
    global $blForceSession;
    $blForceSession = false;
}

function isSessionNeeded() {
    global $blForceSession;
    return $blForceSession;
}
