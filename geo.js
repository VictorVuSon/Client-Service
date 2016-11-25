// 20161125021238
// https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js

eqfeed_callback({
  "type": "FeatureCollection",
  "features": [
    {
      "type": "Feature",
      "properties": {
        "mag": 5.4,
        "place": "Danang, Vietnam",
        "time": 1348176066,
        "tz": 480,
        "url": "http://earthquake.usgs.gov/earthquakes/eventpage/usc000csx3",
        "felt": 2,
        "cdi": 3.4,
        "mmi": null,
        "alert": null,
        "status": "REVIEWED",
        "tsunami": null,
        "sig": "449",
        "net": "us",
        "code": "c000csx3",
        "ids": ",usc000csx3,",
        "sources": ",us,",
        "types": ",dyfi,eq-location-map,general-link,geoserve,historical-moment-tensor-map,historical-seismicity-map,nearby-cities,origin,p-wave-travel-times,phase-data,scitech-link,tectonic-summary,"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          3,
          5,
          1
        ]
      },
      "id": "usc000csx3"
    }, 
  ]
});