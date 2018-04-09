/**
 * 
 */
class LocationHandler {
    constructor() {
        this.location = {};
    }

    /**
     * Links the location to a map
     * @param {google.map} _map link a map where the locations are dependents
     */
    linkMap(_map) {
        this.map = _map;
    }

    /**
     * Save new location
     * @param _location location to save
     */
    post(_location) {
        $.ajax({
            method: 'POST',
            url: '../router/location.php',
            data: {
                location: _location
            },
        })
    }

    /**
     * Change locations
     * @param _location new data for location
     */
    put(_location) {
        $.ajax({
            method: 'PUT',
            url: '../router/location.php',
            data: {
                location: _location
            },
        })
    }

    /**
     * Remove location from database
     * @param _locationID location to delete
     */
    delete(_locationID) {
        $.ajax({
                method: 'DELETE',
                url: '../router/location.php',
                data: {
                    location: _locationID
                },
            })
    }

}
