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
            <button id="tours-title-actions-add" class="button-add">
                <i id="tours-title-actions-add-icon" class="title-buttons-icons">+</i>
            </button>
            <button id="tours-title-actions-close" class="panel-closer">
                <i id="tours-title-actions-close-icon" class="material-icons title-buttons-icons">close</i>
            </button>
        </div>
    </div>
    <hr>
    <div id="tours-list">
        <?php

        $oToday = new DateTime("now");

        /** @var array $aTours */
        // todo darauf achten, als key die id zu speichern
        // Key: Tour id -> Value: Tour object
        $aTours = $oUser->getATours();

        $aFutureTours = array_filter($aTours, function ($oTour) use ($oToday) {
            /** @var tour $oTour */
            /** @var DateTime $oDateTime */
            $oDateTime = $oTour->getODate();

            // If in future this day or another day ...
            if ($oDateTime->getTimestamp() > $oToday->getTimestamp()) {
                return true;
            }

            /** @var DateInterval $oDateInterval */
            $oDateInterval = $oDateTime->diff($oToday);

            if ($oDateInterval->y > 0 || $oDateInterval->m > 0 || $oDateInterval->d > 0) {
                return false;
            }
            return true;
        });
        $aTours = array_diff_key($aTours, $aFutureTours);

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

        array_unshift($aToursAggregatedByMonth, $aFutureTours);

        $iGroupCounter = 0;
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
                $iTourCounter = 0;
                foreach ($aToursPerMonth as $oTour) {
                    $sTourHtmlId = $sGroupHtmlId . "-tour_${iTourCounter}";
                    $iTourCounter++;
                    ?>
                    <div id="<?php echo $sTourHtmlId ?>" type="tours-list">
                        <div class="tour-heading">
                            <span class="expand-button" bh-collapsed bh-expandable="<?php echo $sTourHtmlId ?>-bars">
                                <!-- todo insert tour name -->
                                Tour <?php echo $iTourCounter ?>
                            </span>
                            <div class="tour-actions">
                                <button class="button-add" onclick="onAddImageClicked()">
                                    <i class="">+</i>
                                </button>
                                <button class="button-edit" onclick="onEditTour($(this))">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button class="button-ok hide" onclick="onEditAcceptTour($(this))">
                                    <i class="material-icons">ok</i>
                                </button>
                                <button class="button-close hide" onclick="onEditDenyTour($(this))">
                                    <i class="material-icons">close</i>
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div id="<?php echo $sTourHtmlId ?>-bars">
                            <?php
                            $iMarkerCounter = 0;
                            foreach ($oTour->getAMarkers() as $oMarker) {
                                $sMarkerHtmlId = $sTourHtmlId . "-bars_" . $iMarkerCounter;
                                $iMarkerCounter++;
                                ?>
                                <div id="<?php echo $sMarkerHtmlId ?>" class="tour-bar">
                                    <span class="expand-button" bh-collapsed
                                          bh-expandable="<?php echo $sMarkerHtmlId ?>-content">
                                        <!-- todo insert bar name -->
                                        Kneipe <?php echo $iMarkerCounter ?>
                                    </span>
                                    <hr>
                                    <div class="tour-bar-content" id="<?php echo $sMarkerHtmlId ?>-content">
                                        <div class="tour-bar-image"></div>
                                        <div class="tour-bar-description">
                                            <!-- todo insert marker description -->
                                            Diese tolle Kneipe überzeugt mit großartigem Bier und
                                            ist für Liebhaber jeden Geschmacks leicht zugänglich und erreichbar.
                                        </div>
                                    </div>
                                    <div id="<?php echo $sMarkerHtmlId ?>-comments">
                                        <label for="<?php echo $sMarkerHtmlId ?>-001">Henning123</label>
                                        <textarea id="<?php echo $sMarkerHtmlId ?>-new_comment" readonly>Das ist ein schon bestehender Kommentar.</textarea>
                                        <hr>
                                        <div class="tour-bar-comments-new">
                                            <form name="addComment" method="post">
                                                <input type="hidden" value>
                                                <!-- todo enter tour id to associate with comment -->
                                                <textarea name="comment"></textarea>
                                                <button class="button-add tours-comment-new-submit">
                                                    <i class="">+</i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <!-- todo only show if no tours present yet -->
        <div id="tours-list-no_more" hidden>
            <hr>
            Keine weiteren Touren gefunden ...<br>
            <a href="#">Du kannst aber weitere anlegen.</a>
        </div>

        <!-- popup window to chose tour-->
        <div id="tour-popup-window" class="popup-window">
            <div class="popup-window-content">
                <h1>Tour auswählen</h1>
                <div>
                    <!-- TODO style combobox -->
                    <label for="tour-name"><b>Name:</b></label>
                    <input type="text" id="tour-name">
                </div>
                <div>
                    <label for="select-tour"><b>Gruppe</b></label>
                    <select id="select-tour">
                        <option value="tours-list-group_1">Geplante Touren</option>
                    </select>
                </div>
                <div>
                    <button id="tour-popup-window-btn-ok">Erstellen</button>
                </div>
            </div>
        </div>

        <!-- Tour-list template -->
        <div id="tours-list-group-temp" class="hide" type="tours-list">
            <span class="expand-button" bh-expandable="tours-list-group_1-tour_1-bars"></span>
            <div class="tour-actions">
                <button class="button-add" onclick="onAddImageClicked()">
                    <i class="button-add-icon">+</i>
                </button>
                <button class="button-edit" onclick="onEditTour($(this))">
                    <i class="material-icons">edit</i>
                </button>
                <button class="button-ok hide" onclick="onEditAcceptTour($(this))">
                    <i class="material-icons">ok</i>
                </button>
                <button class="button-close hide" onclick="onEditDenyTour($(this))">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <ul id="">
            </ul>
        </div>
    </div>
</html>
