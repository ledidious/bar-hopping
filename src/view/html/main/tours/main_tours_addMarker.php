<html>

    <!-- popup window to chose tour-->
    <div id="tour-popup-add_marker" class="popup-window">
        <div class="popup-window-content">
            <form name="addMarker" method="post">
                <h1>Marker hinzufügen</h1>
                <div>
                    <label for="marker-name"><b>Name</b></label>
                    <input type="text" name="markerName" id="marker-name">
                </div>
                <div>
                    <label for="marker-comment"><b>Beschreibung</b></label>
                    <textarea name="markerComment" id="marker-comment"></textarea>
                </div>
                <div>
                    <input type="hidden" name="action" value="add">
                    <button onclick="addMainMarker(this, event)">Erstellen</button>
                </div>
            </form>
        </div>
    </div>
</html>
