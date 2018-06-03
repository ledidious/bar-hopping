<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Main page</title>

        <!-- Header -->
        <?php
        $sPageName = basename(__FILE__, ".php");
        require_once "header.php";
        session_start();
        ?>
    </head>

    <body>
        <div id="nav">

            <div id="sidebar">
                <?php require_once "main/main_sidebar.php" ?>
            </div>
            <!-- Profile -->
            <div id="profile" class="panel">
                <?php require_once "main/main_profile.php" ?>
            </div>

            <div id="tours" class="panel">
                <?php require_once "main/main_tours.php" ?>
            </div>
        </div>

        <!-- Map. Referenced by javascript so keep identifier. -->
        <div id="map"></div>

        <!-- Footer -->
        <?php require_once "footer.php" ?>

        <!-- Google maps js -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUfXbzl88V9EOUa2J6VCRYVRhKkQxzuCM"></script>
        <script src="../js/map/geolocation-marker.js"></script>
        <script src="../js/map/map.js"></script>
        <script>
            initMap();
        </script>
    </body>
</html>
