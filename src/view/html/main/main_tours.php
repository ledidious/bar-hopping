<html>

    <!-- hidden input to save/ make a new picture -->
    <form method="post" name="imgUpload" id="tours-form-imgUpload" enctype="multipart/form-data">
        <input type="file" name="pic" id="button-add-pic" accept="image/*" style="display: none;">
    </form>
    <div id="tours-title">
        <h3 id="tours-title-heading">Touren</h3>
        <div id="tours-title-actions">
            <button id="tours-title-actions-close" class="title-buttons panel-closer">
                <i id="tours-title-actions-close-icon" class="material-icons title-buttons-icons">close</i>
            </button>
            <button id="tours-title-actions-add" class="title-buttons button-add">
                <i id="tours-title-actions-add-icon" class="title-buttons-icons button-add-icon">+</i>
            </button>
        </div>
    </div>

    <hr>

    <div id="tours-list">
        <span class="expand-button" bh-expandable="tours-list-group_1">Geplante Touren</span>
        <hr>
        <div id="tours-list-group_1">
            <div id="tours-list-group_1-tour_1" type="tours-list">
                <span class="expand-button" bh-expandable="tours-list-group_1-tour_1-bars">Tour 1</span>
                <div class="tour-actions">
                    <button class="button-add">
                        <i class="button-add-icon">+</i>
                    </button>
                    <button>
                        <i class="material-icons">edit</i>
                    </button>
                </div>
                <ul id="tours-list-group_1-tour_1-bars">
                    <li>Kneipe A</li>
                    <li>Kneipe B</li>
                    <li>Kneipe C</li>
                </ul>
            </div>
            <hr>

            <div id="tours-list-group_1-tour_2" type="tours-list">
                <span class="expand-button" bh-expandable="tours-list-group_1-tour_2-bars">Tour 2</span>
                <div class="tour-actions">
                    <button class="button-add">
                        <i class="button-add-icon">+</i>
                    </button>
                    <button>
                        <i class="material-icons">edit</i>
                    </button>
                </div>
                <ul id="tours-list-group_1-tour_2-bars">
                    <li>Kneipe A</li>
                    <li>Kneipe B</li>
                    <li>Kneipe C</li>
                </ul>
            </div>
        </div>
        <hr>
        <div id="tours-list-no_more">
            Keine weiteren Touren gefunden ...<br>
            <a href="#">Du kannst aber weitere anlegen.</a>
        </div>
        
        <!-- popup window to chose tour-->
        <div id="tour-popup-window" class="popup-window">
            <div class="popup-window-content">
                <span class="popup-window-close">&times;</span>
                <label for="select-tour"><h1>Tour auswählen</h1></label>
                <!-- TODO style combobox -->
                <label for="tour-name"><b>Name:</b></label>
                <input type="text" id="tour-name">
                <select id="select-tour">
                    <option value="tours-list-group_1">Geplante Touren</option>
                </select>

                <button id="tour-popup-window-btn-ok">Erstellen</button>
            </div>
        </div>

        <!-- Tour-list template -->
        <div id="tours-list-group-temp" class="hide" type="tours-list">
            <span class="expand-button" bh-expandable=""></span>
            <button class="button-add tours-add">
                <i class="button-add-icon">+</i>
            </button>
            <ul id="">
            </ul>
        </div>

    </div>
</html>
