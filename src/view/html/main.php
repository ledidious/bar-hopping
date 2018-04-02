<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Main page</title>

        <!-- Header -->
        <?php
            $sPageName = "main";
            include_once "head.php"
        ?>
    </head>
    <body>
        <div id="profile" class="panel">
            <h2 id="profile-title">Profil</h2>

            <div id="profile-back">
                <button id="profile-back-button">
                    <i id="profile-back-button-icon" class="material-icons">arrow_back</i>
                </button>
            </div>
        </div>

        <div id="tours" class="panel">
            <p><span>Tours</span></p>
        </div>

        <div id="map" class="panel">
            <span>Karte</span>
        </div>
    </body>
</html>