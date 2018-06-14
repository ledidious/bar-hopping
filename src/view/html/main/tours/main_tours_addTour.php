<html>

    <!-- popup window to chose tour-->
    <div id="tour-popup-add_tour" class="popup-window">
        <div class="popup-window-content">
            <form name="addTour" class="tour-add_form" method="post">
                <h1>Tour auswählen</h1>
                <div>
                    <label for="tour-name"><b>Name:</b></label>
                    <input type="text" name="tourName" id="tour-name">
                </div>
                <div>
                    <label for="tour-date"><b>Geplantes Datum</b></label>
                    <input type="date" name="tourDate" id="tour-date">
                </div>
                <div>
                    <input type="hidden" name="action" value="add">
                    <button class="button-dialog-confirm" onclick="addMainTour(this, event)">Erstellen</button>
                </div>
            </form>
        </div>
    </div>
</html>
