/**
* Diese Klasse representiert eine location, alles was dazu gehoert, mit marker und kommentar und so ...
*/
class LocationClass {
    constructor() {

    }

    setLatLng(_lat , _lng) {
        this.latLng = {lat: _lat, lng: _lng};
    }

    setImage(_img) {
        this.img = _img;
    }

    setComment(_comment) {
        this.commment = _comment;
    }

    setRating(_rating) {
        this.rating = _rating;
    }

    setPropertiesFor(_for) {
        this.propertiesFor = _for;
    }

    toJSON() {
        return {
            "lat": this.latLng.lat,
            "lng": this.latLng.lng,
            "imgPath": this.img,
            "comment": this.commment,
            "rating": this.rating,
            "propertiesFor": this.propertiesFor
        };
    }
}