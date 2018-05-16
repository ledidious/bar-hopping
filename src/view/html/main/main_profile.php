<html>
    <div>
        <h3 id="profile-title">Profil</h3>
        <button id="profile-close_button" class="title-buttons panel-closer">
            <i id="profile-close_button-icon" class="material-icons title-buttons-icons">close</i>
        </button>
    </div>
    <hr>
    <div id="profile-bar">
        <button id="profile-bar-restore" hidden>
            <i id="profile-bar-restore-icon" class="material-icons">restore</i>
        </button>
        <button id="profile-bar-save" hidden>
            <i id="profile-bar-save-icon" class="material-icons">save</i>
        </button>
        <button id="profile-bar-edit">
            <i id="profile-bar-edit-icon" class="material-icons">edit</i>
        </button>
    </div>
    <div id="profile-image"></div>
    <hr>
    <div id="profile-info">
        <form>
            <div>
                <label for="profile-info-name">Name</label>
                <span id="profile-info-name" class="profile-info-edit_field">John Doe</span>
            </div>
            <div>
                <label for="profile-info-alias">Alias</label>
                <span id="profile-info-alias" class="profile-info-edit_field">Johnny</span>
            </div>
            <div>
                <label for="profile-info-since">Dabei seit</label>
                <span id="profile-info-since" class="profile-info-edit_field">März diesen Jahres</span>
            </div>
            <div id="profile-info-more_button">
                <span id="profile-info-more_button-span" class="expand-button" bh-expandable="profile-info-more"
                      bh-collapsed>Mehr anzeigen</span>
            </div>
            <div id="profile-info-more">
                <label for="profile-info-more-...">Weit. Infos</label>
                <span id="profile-info-more-..." class="profile-info-edit_field">Bla bla</span>
            </div>
        </form>
    </div>
    <hr>
    <div id="tours-favorites">
        <span id="tours-favorites-heading" class="expand-button"
              bh-expandable="tours-favorites-list">Lieblingskneipen</span>

        <ul id="tours-favorites-list">
            <li>Kneipe 1</li>
            <li>Kneipe 2</li>
        </ul>
    </div>
</html>
