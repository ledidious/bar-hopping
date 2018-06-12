<html>

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
        <span class="expand-button" bh-expandable="tours-list-group_1">Geplante Touren</span>
        <hr>
        <div class="tour-group" id="tours-list-group_1">
            <div id="tours-list-group_1-tour_1" type="tours-list">
                <div class="tour-heading">
                    <span class="expand-button" bh-expandable="tours-list-group_1-tour_1-bars">Tour 1</span>
                    <div class="tour-actions">
                        <button class="button-add" onclick="onAddBar($(this))">
                            <i class="">+</i>
                        </button>
                        <button class="button-edit" onclick="onEditTour($(this))">
                            <i class="material-icons">edit</i>
                        </button>
                        <button class="button-ok hide">
                            <i class="material-icons">save</i>
                        </button>
                        <button class="button-close hide">
                            <i class="material-icons">close</i>
                        </button>
                    </div>
                </div>
                <hr>
                <div id="tours-list-group_1-tour_1-bars">
                    <div id="tours-list-group_1-tour_1-bars_1" class="tour-bar">
                        <span class="expand-button" bh-expandable="tours-list-group_1-tour_1-bars_1-content">Kneipe
                            A</span>
                        <hr>
                        <div id="tours-list-group_1-tour_1-bars_1-content">
                            <div id="tours-list-group_1-tour_1-bars_1-content-image" class="tour-bar-image"></div>
                            <div class="tour-bar-description">
                                Diese tolle Kneipe überzeugt mit großartigem Bier und
                                ist für Liebhaber jeden Geschmacks leicht zugänglich und erreichbar.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

        <!-- tour template -->
        <div id="tours-list-group-temp" class="hide" type="tours-list">
            <div class="tour-heading">
                <span class="expand-button" bh-expandable="tours-list-group_1-tour_1-bars">Tour 1</span>
                <div class="tour-actions">
                    <button class="button-add" onclick="onAddBar($(this))">
                        <i class="">+</i>
                    </button>
                    <button class="button-edit" onclick="onEditTour($(this))">
                        <i class="material-icons">edit</i>
                    </button>
                    <button class="button-ok hide">
                        <i class="material-icons">save</i>
                    </button>
                    <button class="button-close hide">
                        <i class="material-icons">close</i>
                    </button>
                </div>
            </div>
            <hr>
            <div id="tour-bar-container">
            </div>
        </div>

        <!-- bar template -->
        <div id="bar-container-temp" class="tour-bar hide">
            <span class="expand-button" bh-expandable="tours-list-group_1-tour_1-bars_1-content">Kneipe
                A</span>
            <hr>
            <div id="tours-list-group_1-tour_2-bars_1-content">
                <div id="tours-list-group_1-tour_2-bars_1-content-image" class="tour-bar-image"></div>
                <div class="tour-bar-description">
                    Diese tolle Kneipe überzeugt mit großartigem Bier und
                    ist für Liebhaber jeden Geschmacks leicht zugänglich und erreichbar.
                </div>
            </div>
        </div>

    </div>
</html>
