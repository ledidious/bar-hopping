<?php

$aKeys = array("DB_NAME", "DB_USERNAME", "DB_PASSWORD");
$aParams = array();

// Read file
$rFile = fopen(__DIR__ . "/db.conf", "r");
if ($rFile === false) {
    die("Can't connect to database because db.conf does not exist or is not readable");
}

// Read file line for line
while (($sLine = fgets($rFile)) !== false) {

    // Skip empty lines
    if (empty($sLine)) {
        continue;
    }

    list($sKey, $sValue) = array_map("trim", explode("=", $sLine));
    if (!in_array($sKey, $aKeys)) {
        die("Unknown config '{$sKey}' in db.conf");
    }

    $aParams[$sKey] = $sValue;
}

// Define constants
define("DB_NAME", $aParams["DB_NAME"]);
define("DB_USERNAME", $aParams["DB_USERNAME"]);
define("DB_PASSWORD", $aParams["DB_PASSWORD"]);

// Check if all available
$aAllConstants = get_defined_constants();
foreach ($aKeys as $sKey) {
    if (!$aAllConstants[$sKey]) {
        die("Param '$sKey' in db.conf does not exist or is empty");
    }
}
