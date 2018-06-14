<html>

    <?php
    require_once __DIR__ . "/../../../model/tour.php";
    require_once __DIR__ . "/../../../model/user.php";
    require_once __DIR__ . "/../../../model/marker.php";
    require_once __DIR__ . "/../../../controller/user.controller.php";
    $oUser = getUser();
    ?>

    <!-- hidden input to save/ make a new picture -->
    <form method="post" name="imgUpload" id="tours-form-imgUpload" enctype="multipart/form-data">
        <input type="file" name="pic" id="button-add-pic" accept="image/*" style="display: none;">
    </form>
    <div id="tours-title">
        <h3 id="tours-title-heading">Touren</h3>
        <div id="tours-title-actions">
            <button id="tours-title-actions-add" class="button-add" onclick="displayAddToursDialog(this, event)">
                <i id="tours-title-actions-add-icon" class="title-buttons-icons">+</i>
            </button>
            <button id="tours-title-actions-close" class="panel-closer button-close">
                <i id="tours-title-actions-close-icon" class="material-icons title-buttons-icons">close</i>
            </button>
        </div>
    </div>
    <hr>
    <div id="tours-list">
        <?php

        // Today
        $oToday = new DateTime("now");

        /** @var array $aTours */
        // todo darauf achten, als key die id zu speichern
        // Key: Tour id -> Value: Tour object
        $aTours = $oUser->getATours();

        // Future tours so with a date in the future
        $aFutureTours = array_filter($aTours, function ($oTour) use ($oToday) {
            /** @var tour $oTour */
            /** @var DateTime $oDateTime */
            $oDateTime = $oTour->getODate();

            // If the date of the tour is later than now ...
            if ($oDateTime->getTimestamp() > $oToday->getTimestamp()) {
                return true;
            }

            // ... otherwise render difference ...
            /** @var DateInterval $oDateInterval */
            $oDateInterval = $oDateTime->diff($oToday);

            // ... and handle as future days if date points to the current day
            if ($oDateInterval->y > 0 || $oDateInterval->m > 0 || $oDateInterval->d > 0) {
                return false;
            }

            return true;
        });
        // Remove already handled future tours
        $aTours = array_diff_key($aTours, $aFutureTours);

        // Group by yearMonth
        $aToursAggregatedByMonth = array();
        foreach ($aTours as $sTourId => $oTour) {
            /** @var DateTime $oDateTime */
            /** @var tour $oTour */
            $oDateTime = $oTour->getODate();

            $iYear = date("Y", $oDateTime->getTimestamp());
            $iMonth = date("m", $oDateTime->getTimestamp());

            $sYearMonth = $iYear . "-" . $iMonth;
            if (array_key_exists($sYearMonth, $aToursAggregatedByMonth)) {
                array_push($aToursAggregatedByMonth[$sYearMonth], $oTour);
            } else {
                $aToursAggregatedByMonth[$sYearMonth] = array($oTour);
            }
        }

        // Add future tours as first element to display at top
        array_unshift($aToursAggregatedByMonth, $aFutureTours);

        // Group counter for dynamic html ids (needed for individual expander)
        $iGroupCounter = 0;
        // Iterate over groups (yearMonths)
        foreach ($aToursAggregatedByMonth as $sYearMonth => $aToursPerMonth) {
            $sGroupHtmlId = "tours-list-group_{$iGroupCounter}";
            $iGroupCounter++;
            ?>
            <span class="expand-button" bh-expandable="<?php echo $sGroupHtmlId ?>">
                <?php
                if (!empty($sYearMonth)) {
                    $oMonth = new DateTime($sYearMonth);
                    echo "Touren am " . date("M Y", $oMonth->getTimestamp());
                } else {
                    echo "Geplante Touren";
                }
                ?>
            </span>
            <hr>
            <div id="<?php echo $sGroupHtmlId ?>" class="tour-group">
                <?php
                // Tour counter for dynamic html ids (needed for individual expander)
                $iTourCounter = 0;
                // Iterate over months
                foreach ($aToursPerMonth as $oTour) {
                    require __DIR__ . "/tours/main_tours_tour.php";
                } ?>
            </div>
        <?php } ?>

        <!-- todo only show if no tours present yet -->
        <div id="tours-list-no_more" hidden>
            <hr>
            Keine weiteren Touren gefunden ...<br>
            <a href="#">Du kannst aber weitere anlegen.</a>
        </div>

        <!-- Popups -->
        <?php require __DIR__ . "/tours/main_tours_addTour.php" ?>
        <?php require __DIR__ . "/tours/main_tours_addMarker.php" ?>
    </div>
</html>
