<html>

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
            <div>
                <span class="expand-button" bh-expandable="tours-list-group_1-tour_1">Tour 1</span>
                <button class="button-add tours-add">
                    <i class="button-add-icon">+</i>
                </button>
                <ul id="tours-list-group_1-tour_1">
                    <li>Kneipe A</li>
                    <li>Kneipe B</li>
                    <li>Kneipe C</li>
                </ul>
            </div>
            <hr>

            <div>
                <span class="expand-button" bh-expandable="tours-list-group_1-tour_2">Tour 2</span>
                <button class="button-add tours-add">
                    <i class="button-add-icon">+</i>
                </button>
                <ul id="tours-list-group_1-tour_2">
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
    </div>
</html>
