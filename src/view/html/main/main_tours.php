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
                        <div id="tours-list-group_1-tour_2-bars_1-comments">
                            <label for="tours-list-group_1-tour_2-bars_1-001">Henning123</label>
                            <textarea id="tours-list-group_1-tour_2-bars_1-new_comment" readonly>Das ist ein schon bestehender Kommentar.</textarea>
                            <hr>
                            <div class="tours-comment-new">
                                <form name="addComment" method="post">
                                    <input type="hidden" value><!-- todo enter tour id to associate with comment -->
                                    <textarea name="comment"></textarea>
                                    <button class="button-add tours-comment-new-submit">
                                        <i class="">+</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
