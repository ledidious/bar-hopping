<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Main page</title>

        <!-- Header -->
        <?php
            $sPageName = basename(__FILE__, ".php");
            require_once "header.php"
        ?>
    </head>

    <body>
        <div id="nav">

            <!-- Profile -->
            <div id="profile" class="panel">
                <?php //require_once "main/main_profile.php" ?>
            </div>
<!---->
<!--            <div id="tours" class="panel">-->
<!--                --><?php //require_once "main/main_tours.php" ?>
<!--            </div>-->
        </div>

        <!-- Map. Referenced by javascript so keep identifier. -->
        <div id="map"></div>

        <!-- Javascripts -->
        <script src="../js/map/map.js"></script>

        <!-- Footer -->
        <?php require_once "footer.php" ?>

        <!-- Google maps js -->
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUfXbzl88V9EOUa2J6VCRYVRhKkQxzuCM&callback=initMap"></script>
    </body>

</html>
