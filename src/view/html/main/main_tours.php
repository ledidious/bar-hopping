<html>

    <div id="tours-title">
        <h3 id="tours-title-heading">Touren</h3>
        <div id="tours-title-actions">
            <button id="tours-title-actions-back" class="title-buttons">
                <i id="tours-title-actions-back-icon" class="material-icons title-buttons-icons">arrow_back</i>
            </button>
            <button id="tours-title-actions-add" class="title-buttons">
                <i id="tours-title-actions-add-icon" class="title-buttons-icons">+</i>
            </button>
        </div>
    </div>

    <hr>

    <div id="tours-list">
        <span class="expand-button" bh-expandable="tours-list-group_1">Geplante Touren</span>
        <div id="tours-list-group_1">

            <span class="expand-button" bh-expandable="tours-list-group_1-tour_1">Tour 1</span>
            <ul id="tours-list-group_1-tour_1">
                <li>Kneipe A</li>
                <li>Kneipe B</li>
                <li>Kneipe C</li>
            </ul>

            <span class="expand-button" bh-expandable="tours-list-group_1-tour_2">Tour 2</span>
            <ul id="tours-list-group_1-tour_2">
                <li>Kneipe A</li>
                <li>Kneipe B</li>
                <li>Kneipe C</li>
            </ul>

        </div>

        <div id="tours-list-no_more">
            Keine weiteren Touren gefunden ...<br>
            <a href="#">Du kannst aber weitere anlegen.</a>
        </div>
    </div>
</html>
