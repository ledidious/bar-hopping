<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Main page</title>

        <!-- Header -->
        <?php
            $sPageName = "main";
            require_once "head.php"
        ?>
    </head>

    <body>
        <div id="nav">
            <div id="profile" class="panel">
                <h2 id="profile-title">Profil</h2>

                <div id="profile-back">
                    <button id="profile-back-button">
                        <i id="profile-back-button-icon" class="material-icons">arrow_back</i>
                    </button>
                </div>
            </div>

            <div id="tours" class="panel">
                <p>
                    <span>Tours</span>
                </p>
            </div>
        </div>

        <!-- Map. Referenced by javascript so keep identifier. -->
        <div id="map"></div>

        <!-- Footer -->
        <?php require_once "footer.php"?>

        <script src="../js/locationHandler.class.js"></script>
        <script src="../js/location.class.js"></script>
        <script src="../js/map.js">
            let map;
            let locationHandler = new LocationHandler();
            locationHandler.linkMap(map);


        </script>

        <!-- Google maps js -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUfXbzl88V9EOUa2J6VCRYVRhKkQxzuCM&callback=initMap"></script>
    </body>

</html>