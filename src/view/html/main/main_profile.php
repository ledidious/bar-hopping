<html>
    <?php
    require_once(__DIR__ . "/../../../model/user.php");
    require_once(__DIR__ . "/../../../controller/user.controller.php");

    $oUser = getUser();
    ?>
    <div id="profile-title">
        <h3 id="profile-title-heading">Profil</h3>
        <div id="profile-title-actions">
            <button id="profile-title-actions-close_button" class="panel-closer button-close">
                <i id="profile-title-actions-close_button-icon" class="material-icons title-buttons-icons">close</i>
            </button>
        </div>
    </div>
    <hr>
    <!-- Retrieve avatar image -->
    <?php
    $sImagePath = "/img/avatars/{$oUser->getSImage()}";
    if (!file_exists(__DIR__ . "/../../../../" . $sImagePath)) {
        // Fallback avatar
        $sImagePath = "/img/avatars/avatar.png";
    }
    ?>
    <button id="profile-image_edit" class="button-edit">
        <i class="material-icons">edit</i>
    </button>
    <img id="profile-image" src="<?php echo $sImagePath ?>">
    <hr>
    <h4 id="profile-info_actions-heading">Profil-Informationen</h4>
    <div id="profile-info_actions">
        <button id="profile-info_actions-restore" hidden>
            <i id="profile-info_actions-restore-icon" class="material-icons">restore</i>
        </button>
        <button id="profile-info_actions-save" hidden>
            <i id="profile-info_actions-save-icon" class="material-icons">save</i>
        </button>
        <button id="profile-info_actions-edit" class="button-edit">
            <i id="profile-info_actions-edit-icon" class="material-icons button-edit">edit</i>
        </button>
    </div>
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
        <div>
            <label>Passwort</label>
            <span id="profile-info-password">Ändern</span>

            <!-- popup window to change password -->
            <div id="profile-info-change_pwd-popup" class="popup-window">
                <div class="popup-window-content">
                    <h1>Passwort ändern</h1>
                    <form id="profile-info-change_pwd-popup-form" method="get" name="change_pwd">
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
