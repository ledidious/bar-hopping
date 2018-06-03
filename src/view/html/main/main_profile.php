<html>
    <?php
    require_once(__DIR__ . "/../../../model/user.php");
    require_once(__DIR__ . "/../../../controller/user.controller.php");

    $oUser = getUser();
    ?>
    <div id="profile-title">
        <h3 id="profile-title-heading">Profil</h3>
        <div id="profile-title-actions">
            <button id="profile-title-actions-close_button" class="panel-closer">
                <i id="profile-title-actions-close_button-icon" class="material-icons title-buttons-icons">close</i>
            </button>
        </div>
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
            <i id="profile-bar-edit-icon" class="material-icons button-edit">edit</i>
        </button>
    </div>
    <!-- Retrieve avatar image -->
    <?php
    $sImagePath = "/img/avatars/{$oUser->getSImage()}";
    if (!file_exists(__DIR__ . "/../../../../" . $sImagePath)) {
        $sImagePath = "/img/avatars/avatar.png";
    }
    ?>
    <img id="profile-image" src="<?php echo $sImagePath ?>">
    <hr>
    <div id="profile-info">
        <div>
            <label for="profile-info-name">Name</label>
            <span id="profile-info-name" class="profile-info-edit_field"><?php echo $oUser->getSUsername() ?></span>
        </div>
        <div>
            <label for="profile-info-alias">Alias</label>
            <span id="profile-info-alias" class="profile-info-edit_field"><?php echo $oUser->getSUsername() ?></span>
        </div>
        <div>
            <label for="profile-info-since">Dabei seit</label>
            <span id="profile-info-since" class="profile-info-edit_field"><?php echo $oUser->getDJoinedSince() ?></span>
        </div>
        <div id="profile-info-more_button">
            <span id="profile-info-more_button-span" class="expand-button" bh-expandable="profile-info-more"
                  bh-collapsed>Mehr anzeigen</span>
        </div>
        <div id="profile-info-more">
            <div>
                <label for="profile-info-more-...">Weit. Infos</label>
                <span id="profile-info-more-..." class="profile-info-edit_field">Bla bla</span>
            </div>
            <div>
                <a id="profile-info-more-change_pwd-link">Passwort ändern</a>

                <!-- popup window to chose tour-->
                <div id="profile-info-more-change_pwd-popup" class="popup-window">
                    <div class="popup-window-content">
                        <h1>Passwort ändern</h1>
                        <form id="profile-info-more-change_pwd-popup-form" method="get" name="change_pwd">
                            <div>
                                <label for="change_pwd-password">Passwort</label>
                                <input id="change_pwd-password" name="password" type="text" placeholder="Passwort">
                            </div>
                            <div>
                                <label for="change_pwd-password_repeat">Passwort wiederholen</label>
                                <input id="change_pwd-password_repeat" name="password_repeat" type="text"
                                       placeholder="Passwort wiederholen">
                            </div>
                            <div>
                                <input id="change_pwd-submit" type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
